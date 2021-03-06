
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="widget">
                <img src="" alt="">
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
        <div class="col-md-3">
            <h4>{{Facades\App\Services\Setting\UseSetting::sort()}}</h4>
            <div class="row" style="padding-left:0">
                <div class="container">
                    @foreach (App\Products::sort(Facades\App\Services\Setting\UseSetting::sort())->take(6)->get() as $product)
                        <a href="{{route('detailProduct',[ 'id' => $product->id])}}">
                            <img class="col-3 img-soft" src="{{asset('storage/ImageProduct/'.$product->id.'.png')}}" alt="" width="70" height="60"/>
                        </a>
                    @endforeach    
                </div>                
            </div>
        </div>
        <div class="col-md-3">
            <div class="useful_link">
                <h4>useful link</h4>
                <ul>
                    <li><a href="#">home</a></li>
                    <li><a href="#">about us</a></li>
                    <li><a href="#">service</a></li>
                    <li><a href="{{ route('contact') }}">{{ __('Contact') }}</a></li>
                    <li><a href="#">portfolio</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-3">
            <h4>description</h4>
            <p class="description">{{Facades\App\Services\Setting\UseSetting::description()}}</p>
        </div>
    </div>
</div>