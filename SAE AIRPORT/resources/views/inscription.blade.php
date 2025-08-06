@extends('layout')

@section('title', 'Page d\'inscription')

@section('content')
    <div class="container my-5" id="inscription">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm p-4">
                    <h3 class="text-center mb-4">Inscription</h3>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            {{$message}}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="post" action="/transaction">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="idnom" class="form-label">Nom</label>
                                <input type="text" id="idnom" name="nom" class="form-control" placeholder="Votre nom" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="idprenom" class="form-label">Prénom</label>
                                <input type="text" id="idprenom" name="prenom" class="form-control" placeholder="Votre prénom" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="idemail" class="form-label">Email</label>
                            <input type="email" id="idemail" name="email" class="form-control" placeholder="Votre email" required>
                        </div>
                        <div class="mb-3">
                            <label for="idpassword" class="form-label">Mot de passe <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="password" id="idpassword" name="password" class="form-control" placeholder="Votre mot de passe" required>
                                <button type="button" class="btn btn-outline-secondary toggle-password">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="idpassword" class="form-label">Confirmation du mot de passe <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="password" id="idconfirmpassword" name="password_confirmation" class="form-control" placeholder="Confirmez votre mot de passe" required>
                                <button type="button" class="btn btn-outline-secondary toggle-password">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                        </div>
                        <div class="form-check pt-2" id="subscribe_box">
                            <input type="checkbox" class="form-check-input" id="subscribe" name="newsletter" value="1">
                            <label class="form-check-label" for="subscribe">Abonnez vous aux newsletter</label>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">S'inscrire</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.toggle-password').forEach(button => {
            button.addEventListener('click', function () {
                // Récupère l'input associé au bouton cliqué (input sibling dans le même parent)
                const passwordField = this.previousElementSibling;
                const eyeIcon = this.querySelector('i');

                // Change le type du champ de mot de passe
                if (passwordField.type === 'password') {
                    passwordField.type = 'text';
                    eyeIcon.classList.replace('bi-eye', 'bi-eye-slash');
                } else {
                    passwordField.type = 'password';
                    eyeIcon.classList.replace('bi-eye-slash', 'bi-eye');
                }
            });
        });
    </script>

@endsection
