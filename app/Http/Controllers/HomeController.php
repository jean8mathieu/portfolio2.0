<?php

namespace App\Http\Controllers;

use App\Http\Requests\Home\ContactRequest;
use App\Models\Project;
use App\Models\Tag;
use App\Models\User;
use App\Notifications\ContactFormSubmitted;
use Illuminate\Http\Request;
use ReCaptcha\ReCaptcha;

class HomeController extends Controller
{

    /**
     * Show the home index page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $projectsSlider = Project::query()
            ->whereNotNull('cover')
            ->orderBy('created_at', 'desc')
            ->limit('5')
            ->get();

        $projects = Project::query()
            ->orderBy('created_at', 'desc')
            ->paginate();

        return view('home.index', compact('projects', 'projectsSlider'));
    }

    /**
     * Show the home about page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function about()
    {
        $aboutme = "<p>
            Hi, let me present my self.

            My name is Jean-Mathieu Emond, I was born in Quebec and lived in Ontario for 10 years. I can speak and write
            French & English. Since 2014, I have been working on multiple projects that people always been enjoying to
            use. I always try to make my code as efficient as possile and bug free. My expertise is working on the
            backend code of website. I have also wrote some autonomous script that could play a game for me using Java.

            The biggest project I've worked on would have been <a href='https://truckersmp.com/'>TruckersMP</a>. The
            project currently have more than 3.1 millions registered users.
        </p>

        <p>
            My technical expertise include cross-platform proficiency (Windows, Linux and Mac). The languages that I'm
            the most fluent in are PHP, HTML, CSS, Javascript, JQuery, Ajax, MySQL, OracleSQL and Java. I have
            developed multiple application using the MVC model and I have also use multiple PHP framework including
            CakePHP, FuelPHP and Laravel for Web Development. For web design, I currently use Font-Awesome and Bootstrap
            as my main library.
        </p>

        <p>
            I'm always looking to learn new things that could help me to be more efficient in making certain
            application. I enjoy coding and I have participated to multiple hackathon as you can see bellow.
        </p>";

        foreach (Tag::all() as $tag) {
            $aboutme = preg_replace("/\b{$tag->name}\b/u", $tag->getButton(), $aboutme);
        }

        return view('home.about', compact('aboutme'));
    }

    /**
     * Show the home contact page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function contact()
    {
        return view('home.contact');
    }

    /**
     * Post Contact (Submit form)
     *
     * @param  ContactRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function postContact(ContactRequest $request)
    {
        if (
            !env('RE_CAPTCHA_SITE_KEY', false)
            || !env('RE_CAPTCHA_SECRET_KEY', false)
            || !env('SLACK_CONTACT_NOTIFICATION', false)
        ) {
            back()->withErrors('Error', "Looks like you forgot to set up some env configuration...")
                ->withInput();
        }

        $response = (new ReCaptcha(env('RE_CAPTCHA_SECRET_KEY')))
            ->setExpectedAction('contact')
            ->verify($request->input('token'), $request->ip());

        if (!$response->isSuccess()) {
            back()->withErrors('Error', "Something went wrong... Please try again...")
                ->withInput();
        }

        if ($response->getScore() < 0.6) {
            back()->withErrors('Error', "This request doesn't look legit... Please try again...")
                ->withInput();
        }

        $user = User::query()->first();
        $user->notify((new ContactFormSubmitted($request->from, $request->subject, $request->body)));

        return redirect()
            ->route('home.index')
            ->with('status', 'We have sent the information!');
    }

    /**
     * Get project base by the tag
     *
     * @param  Tag $tag
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function tag(Tag $tag)
    {
        $projectsSlider = $tag->projects()
            ->whereNotNull('cover')
            ->orderBy('created_at', 'desc')
            ->limit('5')
            ->get();

        $projects = $tag->projects()
            ->orderBy('created_at', 'desc')
            ->paginate();

        return view('home.index', compact('projectsSlider', 'projects', 'tag'));
    }

    /**
     * Show the experience
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function experience()
    {
        return view('home.experience');
    }
}
