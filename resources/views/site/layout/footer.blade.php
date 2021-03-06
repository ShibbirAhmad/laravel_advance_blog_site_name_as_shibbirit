
    <footer>

        <div class="container">
            <div class="row">
    
                <div class="col-lg-4 col-md-6">
                    <div class="footer-section">
    
                      
                        <p class="copyright">{{ config('app.name') }} @ 2020. All rights reserved.</p>
                        <p class="copyright">Designed by <a href="{{route('colorlib')}}" target="_blank">Colorlib</a> and Developed By <a target="_blank" href="{{route('home')}}">shibbirit</a></p>
                        <ul class="icons">
                            <li><a href="{{route('facebook')}}"><i class="fab fa-facebook-f "></i></a></li>
                            <li><a href="{{route('linkedin')}}"><i class="fab fa-linkedin "></i></a></li>
                            <li><a href="{{route('pinterest')}}"><i class="fab fa-pinterest-p " aria-hidden="true"></i> </a></li>
                            <li><a href="{{route('twitter')}}"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="{{route('github')}}"><i class="fab fa-git"></i></a></li>
                            <li><a href="{{route('vimeo')}}"><i class="fab fa-vimeo-square"></i></a></li>
                        </ul>
    
                    </div><!-- footer-section -->
                </div><!-- col-lg-4 col-md-6 -->
    
                <div class="col-lg-4 col-md-6">
                        <div class="footer-section">
                        <h4 class="title"><b>Categories</b></h4>
                        <ul>
                           @foreach ($categories as $category)
                                <li><a href="{{ route('category.post',$category->slug) }}">{{ $category->name }}</a></li>
                           @endforeach       
                 
                        </ul> 
                        <ul>
                            <h4 class="mt-3"><b>Tags</b></h4>
                             @foreach ($tags as $tag)
                                   
                                <li><a href="{{ route('tag.post',$tag->slug) }}"> {{ $tag->name }} </a></li>
                
                             @endforeach
                              
                        </ul>
                    </div><!-- footer-section -->
                </div><!-- col-lg-4 col-md-6 -->
    
                <div class="col-lg-4 col-md-6">
                    <div class="footer-section">
    
                        <h4 class="title"><b>SUBSCRIBE</b></h4>
                        <div class="input-area">
                            <div class="form-inline">
                                <form action="{{route('subscriber')}}" method="POST" >
                                    @csrf
                                    <input class="email-input form-control" type="email" name="email" placeholder="Enter your email">
                                    <button class="submit-btn" type="submit"><i class="fa fa-envelope fa-lg"></i></button>
                                </form>
                            </div>
                            
                        </div>
    
                    </div><!-- footer-section -->
                </div><!-- col-lg-4 col-md-6 -->
    
            </div><!-- row -->
        </div><!-- container -->
    </footer>
    