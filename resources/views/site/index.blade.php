@extends('site.layout.master')

@push('css')
    
    <link href="{{asset('site/common-css/swiper.css ')}}" rel="stylesheet">
         
	<link href="{{asset('site/front-page-category/css/styles.css ')}}" rel="stylesheet">

    <link href="{{asset('site/front-page-category/css/responsive.css ')}}" rel="stylesheet">
    <style>
        .favourite_post{ color:blue; }
    </style>

@endpush


@section('title','home')

@section('slider')

<div class="main-slider">
    <div class="swiper-container position-static" data-slide-effect="slide" data-autoheight="false"
        data-swiper-speed="500" data-swiper-autoplay="10000" data-swiper-margin="0" data-swiper-slides-per-view="4"
        data-swiper-breakpoints="true" data-swiper-loop="true" >
        <div class="swiper-wrapper">

            @foreach ($categories as $category)
                
            <div class="swiper-slide">
                <a class="slider-category" href="{{ route('category.post',$category->slug)}}">
                    <div class="blog-image"><img style="width:400px;height:250px;" src="{{asset('backend/images/category/'.$category->image)}}" alt="{{$category->name}}"></div>

                    <div class="category">
                        <div class="display-table center-text">
                            <div class="display-table-cell">
                                <h3><b>{{$category->name }}</b></h3>
                            </div>
                        </div>
                    </div>
                </a>
            </div><!-- swiper-slide -->

            @endforeach
         

        </div><!-- swiper-wrapper -->

    </div><!-- swiper-container -->

</div><!-- slider -->

@endsection

@section('content')
    
<div   class="row">

    @foreach ($posts as $post)
        
   
    <div class="col-lg-4 col-md-6">  
        <div class="card h-100">
            <div  class="single-post post-style-1">

                <div class="blog-image"><img src="{{asset('backend/images/posts/'.$post->image )}} " alt="{{$post->title}}"></div>

                <a class="avatar" href="{{ route('author.profile',$post->user->username) }}"><img src="{{asset('backend/images/profile/'.$post->user->image)}} " alt="Profile Image"></a>

                <div class="blog-info">

                    <h4 class="title"><a href="{{route('post.details',$post->slug)}}"><b>{{ $post->title }}</b></a></h4>

                    <ul class="post-footer">
                        <li>
                    
                            @guest
                            
                            <a onclick="return confirm('Login first to add favourite');" href="#">
                                <i class="fa fa-heart"></i>{{ $post->favourite_to_users->count() }}</a>

                            @else 

                            <a  onclick="document.getElementById('favourite-form-{{$post->id}}').submit(); " href="javascript:void(0);"
                                class="{{!Auth::user()->favourite_posts->where('pivot.post_id',$post->id)->count()==0 ? 'favourite_post' : ''  }}"  > 
                        <i class="fa fa-heart"></i>{{ $post->favourite_to_users->count() }}
                         </a>
                    
                         <form  method="POST" id="favourite-form-{{$post->id}}"
                                     action="{{route('post.favourite',$post->id)}} " style="display:none" >
                                    @csrf      
                          </form>

                            @endguest

                        </li>
                        <li><a href="{{route('post.details',$post->slug)}}"><i class="fa fa-comments"></i>{{$post->comments()->count() }}</a></li>
                        <li><a href="{{route('post.details',$post->slug)}}"><i class="fa fa-eye"></i>{{ $post->view_count }}</a></li>
                    </ul>

                </div><!-- blog-info -->

            </div><!-- single-post -->

        </div><!-- card -->
    </div><!-- col-lg-4 col-md-6 -->
    
     @endforeach

                             
</div><!-- row -->

                       <div id="hide_loader" class="loader text-center">
                           <button id="load_more" class="btn btn-info"><b>Load More..</b></button>
                       </div>

<!--in this row will display ajax loaded posts --> 
<div id="post_displayer" class="row">
     
  

 </div>


@endsection





@push('js')
    


<script>

    $(function(){
       
       
    //this is load more function 
      $('#load_more').on('click',function postLoader() {
      
        var dataUrl = '{{url('load-more/data')}}' ;

        var post_file_path= '{{asset('backend/images/posts') }}/' ;
        var avator_file_path= '{{asset('backend/images/profile') }}/' ;
        var detailsUrl= '{{route('post.details',":slug")}}' ;
        var authorUrl='{{ route('author.profile',":username") }}' ;

           $.ajax({

               url      : dataUrl,
               method   : 'GET' ,
               dataType : 'JSON',
               cache    : false ,
            contentType : 'application/json',
               success  : function(response){
                 
                 
                     
                 if(response.success=="OK"){
                    console.log(response.data)
                  var html = '';
                  response.data.forEach(function(post){
                   html += ' <div class="col-lg-4 col-md-6"> '  
                   html += ' <div class="card h-100"> '  
                   html += ' <div  class="single-post post-style-1"> ' 

                   html += '<div class="blog-image"> <img src= "' + post_file_path+post.image + '" >' 

                        html += '<a class="avatar" href="'+ authorUrl.replace(':username',post.user.username) +'" ><img src="' + avator_file_path+post.user.image + '"></a>'

                   html +=  '</div>'

                   html += '<h4 class="title " ><a href="'+ detailsUrl.replace(':slug',post.slug) +'" ><b>' + post.title + '</b></a></h4>'
                   
                   
                   html += '<ul class="post-footer">'

                       html += '<li> <a href="'+ detailsUrl.replace(':slug',post.slug) +'" > <i class=" fa fa-heart"></i> </a> </li>'     
                       html += '<li> <a href="'+ detailsUrl.replace(':slug',post.slug) +'" > <i class=" fa fa-comments"></i> </a></li>'     
                       html += '<li> <a href="'+ detailsUrl.replace(':slug',post.slug) +'" > <i class=" fa fa-eye"></i>' + post.view_count + '</a> </li>'     
                
                 html += '</ul>'
    
                 html += '</div>' 
                 html += '</div>' 
                 html += '</div>' 

                 
                   })
                
               
                    $('#post_displayer').html(html)

                    $('#hide_loader').hide()

                 }
                   
               },

               error : function(error){
                  
                     console.log(error)
               }


           })
    
                })
                 
            });
    
    </script>


@endpush