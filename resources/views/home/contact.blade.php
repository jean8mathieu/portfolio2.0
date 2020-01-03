@extends('layouts.app')
@section('title', 'Contact')

@section('content')
    <div class="container">
        @include('shared.breadcrumb', [
            'breadcrumb' => [
                'Home' => route('home.index'),
                'Contact' => route('home.contact')
            ]
        ])
        <div class="row">
            <div class="col-md-12">
                <h1>Contact me</h1>
                <div class="row">
                    <div class="col-md-6">
                        <p>
                            You can contact me by email at
                            <a href="mailto:jean-mathieu.emond@jmdev.ca">
                                jean-mathieu.emond@jmdev.ca
                            </a>
                            and if you wish to have my phone number, let me know in the email. I will get back to you as
                            soon as
                            possible.
                        </p>

                        <p>If you're looking for someone to build a website or an application for you. Please write a
                            descriptive email with an offer and I'll get back to you with future information.</p>
                    </div>

                    <div class="col-md-6">
                        <form id="contact_form" action="{{ route('home.postContact') }}" method="post">
                            @csrf
                            <label for="from">From</label>
<<<<<<< Updated upstream
                            <input id="from" name="from" type="email" placeholder="From" class="form-control {{ $errors->has('from') ? "is-invalid" : "" }}" required value="{{ old('from') }}">
                            @if ($errors->has('from'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('from') }}</strong>
                                </span>
                            @endif

                            <label for="subject">Subject</label>
                            <input id="subject" name="subject" type="text" placeholder="Subject" class="form-control {{ $errors->has('subject') ? "is-invalid" : "" }}" required value="{{ old('subject') }}">
                            @if ($errors->has('subject'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('subject') }}</strong>
                                </span>
                            @endif

                            <label for="body">Message</label>
                            <textarea id="body" name="body" placeholder="Message content" class="form-control {{ $errors->has('body') ? "is-invalid" : "" }}"
=======
                            <input id="from" name="from" type="email" placeholder="From" class="form-control text-white" style="background-color: #222" required value="{{ old('from') }}">

                            <label for="subject">Subject</label>
                            <input id="subject" name="subject" type="text" placeholder="Subject" class="form-control text-white" style="background-color: #222" required value="{{ old('subject') }}">

                            <label for="body">Message</label>
                            <textarea id="body" name="body" placeholder="Message content" class="form-control text-white" style="background-color: #222"
>>>>>>> Stashed changes
                                      rows="10">{{ old('body') }}</textarea>
                            @if ($errors->has('body'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('body') }}</strong>
                                </span>
                            @endif

                            <script
                                src="https://www.google.com/recaptcha/api.js?render={{ env('RE_CAPTCHA_SITE_KEY') }}">
                            </script>

                            <button id="btn-contact-form" type="submit" class="btn btn-success mt-3 w-100">
                                Send Email
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        let form = $('#contact_form');
        form.submit(function (event) {
            $('#btn-contact-form').prop('disabled', 'disabled');
            event.preventDefault();

            grecaptcha.ready(function () {
                grecaptcha.execute('{{ env('RE_CAPTCHA_SITE_KEY') }}', {action: 'contact'}).then(function (token) {
                    form.prepend('<input type="hidden" name="token" value="' + token + '">');
                    form.prepend('<input type="hidden" name="action" value="contact">');
                    form.unbind('submit').submit();
                });
            });
        });

    </script>
@endsection
