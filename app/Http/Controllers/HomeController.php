<?php

namespace App\Http\Controllers;

use App\Http\Requests\Home\ContactRequest;
use App\Models\Experience;
use App\Models\Project;
use App\Models\SiteSetting;
use App\Models\Tag;
use App\Models\User;
use App\Notifications\ContactFormSubmitted;
use GrahamCampbell\Markdown\Facades\Markdown;
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
            ->paginate(5);

        return view('home.index', compact('projects', 'projectsSlider'));
    }

    /**
     * Show the home about page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function about()
    {
        $aboutme = Markdown::convertToHtml(SiteSetting::get('about'));

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
        $contact = Markdown::convertToHtml(SiteSetting::get('contact'));
        return view('home.contact', compact('contact'));
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
        $projects = $tag->projects()
            ->orderBy('created_at', 'desc')
            ->get();

        $blogs = $tag->blogs()
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return view('tag.index', compact('projects', 'tag', 'blogs'));
    }

    /**
     * Show the experience
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function experience()
    {
        $experiences = Experience::orderByDesc('started_at')->get();

        return view('home.experience', compact('experiences'));
    }
}
