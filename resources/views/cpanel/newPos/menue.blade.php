<section id="portfolio" class="portfolio">
    <div class="container" data-aos="fade-up" style="padding:10px ">

        <div class="section-title">
            <h2>Welcome {{auth() -> user() -> name}}</h2>
            <p>Check your Food Menu</p>
        </div>

                <div class="row" data-aos="fade-up" data-aos-delay="100" >
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="portfolio-flters" class="scrollmenu">
                            @foreach ($categories  as $key => $category)
                                <li data-filter=".{{$category -> id}}">
                                    <div class="movie-card m-1"
                                         onclick="selecCategory(this , {{$category -> id}} )">

                                        <div class="movie-img">
                                            <img src="{{ asset('images/Category/' . $category->img) }}"
                                                 class="img-fluid" onerror=" this.onerror=null;this.src='{{asset('images/Category/default_cat.png')}}';" >
                                        </div>
                                        <div class="movie-title">
                                            <p class="text-white text-sm-center font-small flex-center"> {{ Config::get('app.locale') == 'ar' ? $category -> name_ar : $category -> name_en }} </p>
                                        </div>

                                    </div>


                                </li>

                            @endforeach



                        </ul>
                    </div>
                </div>


        <div class="row">
            <div  class="col-9"  >
                <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200" >
                    @foreach($items as $item)
                        @if($item -> type == 0 && count($item -> sizes) > 0)
                            <div
                                class="col-lg-3 col-md-4  col-sm-12 portfolio-item {{$item -> category_id}}">
                                <div class="portfolio-wrap item-parent">
                                    <img src="{{ asset('images/Item/' . $item->img) }}"
                                         class="img-fluid item-img" alt="" onerror=" this.onerror=null;this.src='{{asset('images/Item/default_item.png')}}';">
                                    <label
                                        class="item-name {{ Config::get('app.locale') == 'ar' ?  'name_ar' : 'name_en' }}">
                                        {{ Config::get('app.locale') == 'ar' ? $item -> name_ar : $item -> name_en}}</label>
                                    <div class="row sizes">
                                        @foreach($item -> sizes as $size)
                                            <div class="col text-center" onclick="selecItemSize( {{$size}} , {{ $item}})">
                                                {{$size -> size -> label}}
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>

                        @endif
                    @endforeach
                </div>

            </div>

            <div class="col-3">
                <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200"  >
                    @foreach($items as $item)
                        @if($item -> type == 1 )
                            @if( count($item -> sizes) > 0)
                                <div  class="col-lg-6 col-md-6 col-sm-12 portfolio-item {{$item -> category_id}} item-div" style="">
                                    <div class="portfolio-wrap item-parent extra"
                                         onclick="selectExtra({{ $item}})">
                                        <img src="{{ asset('images/Item/' . $item->img) }}"
                                             class="img-fluid extra-img" alt="" onerror=" this.onerror=null;this.src='{{asset('images/Item/default_item.png')}}';">
                                        <label
                                            class="extra-name {{ Config::get('app.locale') == 'ar' ?  'name_ar' : 'name_en' }}">
                                            {{ Config::get('app.locale') == 'ar' ? $item -> name_ar : $item -> name_en}}</label>

                                    </div>
                                </div>
                            @endif
                        @endif
                    @endforeach
                </div>
            </div>


        </div>











        </div>

</section>
