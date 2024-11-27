<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   @include('partials.header')
    <body class="antialiased">
        @include('partials.navbar')
            <div class="Container d-flex justify-content-center align-items-center vh-100">
                <div class="card mx-auto mt-4 shadow-lg p-4 rounded" style="width: 33rem; border: none;">
                    <img src="{{ $user->image ? asset(Storage::url($user->image)) : asset('default-avatar.png') }}" class="card-img-top rounded-circle mx-auto shadow" alt="Card Image" style="width: 150px; height: 150px; object-fit: cover; margin-top: -75px; border: 5px solid white;">
                    <div class="card-body">
                        <h5 class="card-title text-center">Katsioulas Konstantinos</h5>
                        <div class="d-flex justify-content-center gap-2"> 
                            <a href="tel:+306973212894" class="text-dark-emphasis"><i class="fa-solid fa-phone"></i> 6973212894</a> |
                            <a href="mailto:kostaskats4@gmail.com" class="text-dark-emphasis"><i class="fa-solid fa-at"></i> Email</a> |
                            <a href="https://www.linkedin.com/in/konstantinos-k-07956014a/" class="text-dark-emphasis"> <i class="fa-brands fa-linkedin-in"></i> Linkedin</a> |
                            <a href="https://github.com/kostas3V" class="text-dark-emphasis"><i class="fa-brands fa-github"> </i> Github</a> 
                        </div>  
                        <hr>
                        <div class="text-center">
                            <a href="{{ route('education.index') }}" class="btn btn-outline-primary btn-sm">VIEW MORE</a>
                        </div>
                        
                    </div>
                </div>
            </div>           
    </body>
</html>