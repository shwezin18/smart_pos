<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">

    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{url('images/cars.jpeg')}}" class="d-block w-100" style="height: 500px" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>First slide label</h5>
                <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
            </div>
        </div>
       @foreach($slide_post->postimage as $img)
            <div class="carousel-item">
                <img src="{{route('post.image.front',['img_name'=>$img->image])}}" style="height: 500px" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                </div>
            </div>
           @endforeach

    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
