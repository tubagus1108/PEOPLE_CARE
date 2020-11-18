
<!DOCTYPE html>
<html>
    <head>
        <title>Admin Panel</title>

        <meta charset="UTF-8">
        <meta name="description" content="Clean and responsive administration panel">
        <meta name="keywords" content="Admin,Panel,HTML,CSS,XML,JavaScript">
        <meta name="author" content="Erik Campobadal">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="{{asset('assetslogin/css/uikit.min.css')}}" />
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="{{asset('assetslogin/css/style.css')}}" />
        <link rel="stylesheet" href="{{asset('assetslogin/css/notyf.min.css')}}" />
        <script src="{{asset('assetslogin/js/uikit.min.js')}}" ></script>
        <script src="{{asset('assetslogin/js/uikit-icons.min.js')}}" ></script>
    </head>
    <body>
        <div class="content-background uk-background-primary">
            <div class="uk-section-large">
                <div class="uk-container uk-container-large">
                    <div uk-grid class="uk-child-width-1-1@s uk-child-width-2-3@l">
                        <div class="uk-width-1-1@s uk-width-1-5@l uk-width-1-3@xl"></div>
                        <div class="uk-width-1-1@s uk-width-3-5@l uk-width-1-3@xl">
                            <div class="uk-card uk-card-default">
                                <div class="uk-card-body">
                                    <center>
                                        <h2><strong>Register</strong></h2><br />
                                    </center>
                                    <form action="{{ route('register') }}" method="post">
                                        @csrf
                                        <fieldset class="uk-fieldset">
                                            @if (Session::has('success'))
                                            <div class="alert alert-success">
                                                {{ Session::get('success') }}
                                            </div>
                                            @endif
                                            @if (Session::has('error'))
                                                <div class="alert alert-danger">
                                                    {{ Session::get('error') }}
                                                </div>
                                            @endif
                                            <div class="uk-margin">
                                                <div class="uk-position-relative">
                                                    <span class="uk-form-icon ion-users"></span>
                                                    <input name="name" class="uk-input" type="text" placeholder="Name">
                                                </div>
                                            </div>

                                            <div class="uk-margin">
                                                <div class="uk-position-relative">
                                                    <span class="uk-form-icon ion-edit"></span>
                                                    <input name="username" class="uk-input" type="text" placeholder="Username">
                                                </div>
                                            </div>

                                            <div class="uk-margin">
                                                <div class="uk-position-relative">
                                                    <span class="uk-form-icon ion-android-person"></span>
                                                    <input name="email" class="uk-input" type="email" placeholder="Email">
                                                </div>
                                            </div>

                                            <div class="uk-margin">
                                                <div class="uk-position-relative">
                                                    <span class="uk-form-icon ion-locked"></span>
                                                    <input name="password" class="uk-input" type="password" placeholder="Password">
                                                </div>
                                            </div>

                                            <div class="uk-margin">
                                                <div class="uk-position-relative">
                                                    <span class="uk-form-icon ion-locked"></span>
                                                    <input name="password_confirmation" class="uk-input" type="password" placeholder="Repeat Password">
                                                </div>
                                            </div>
                                            <div class="uk-margin">
                                                <div class="uk-position-relative">
                                                    <span class="uk-form-icon ion-phone"></span>
                                                    <input name="phone" class="uk-input" type="number" placeholder="Phone" required>
                                                </div>
                                            </div>

                                            <div class="uk-margin">
                                                <button type="submit" class="uk-button uk-button-primary">
                                                    <span class="ion-forward"></span>&nbsp; Register
                                                </button>
                                            </div>

                                            <hr />

                                            <center>
                                                <p>
                                                    Already have an account?
                                                </p>
                                            <a href="{{route('login')}}" class="uk-button uk-button-default">
                                                    <span class="ion-android-person"></span>&nbsp; Login
                                                </a>
                                            </center>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="uk-width-1-1@s uk-width-1-5@l uk-width-1-3@xl"></div>
                    </div>
                </div>
            </div>
        </div>
        <script src="js/script.js"></script>
    </body>
</html>
