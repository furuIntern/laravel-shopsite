
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="widget">
                <p></p>
                <ul class="social">
                    <li><a href=""><i class="fab fa-facebook"></i></a></li>
                    <li><a href=""><i class="fab fa-twitter"></i></a></li>
                    <li><a href=""><i class="fab fa-linkedin-in"></i></a></li>
                    <li><a href=""><i></i></a></li>
                    <li><a href=""><i></i></a></li>
                </ul>
                <span><i class="fas fa-envelope"></i>example@gmail.com</span>
                <span><i class="fas fa-phone"></i>0900 (23456366)</span>
                <span><i class="fas fa-map-marker-alt"></i>4465 Washington Avenue De Pere, WI 54115</span>
                            
                        
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="useful_link">
                <h4>useful link</h4>
                <ul>
                    <li><a href="">home</a></li>
                    <li><a href="">about us</a></li>
                    <li><a href="">service</a></li>
                    <li><a href="{{ route('contact') }}">{{ __('Contact') }}</a></li>
                    <li><a href="">portfolio</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-4">
            <h4>description</h4>
            <p class="description">{{Facades\App\Services\Setting\UseSetting::description()}}</p>
        </div>
    </div>
</div>