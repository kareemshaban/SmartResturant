<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"
                        style="color: red; font-size: 20px; font-weight: bold;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <input type="hidden" id="hall0" name="hall0" value="{{ count($halls) > 0 ? $halls[0] -> id : 0}}">
            <div class="modal-body" id="mediumBody">
                <div class="container">
                    <div class="row" data-aos="fade-up">
                        <div class="col-lg-12 d-flex justify-content-center">
                            <ul id="modal-flters" style="background: lightgray;">
                                @foreach($halls as $hall)
                                    <li
                                        onclick="selectHall(this , {{$hall -> id}})">
                                        {{ ( Config::get('app.locale') == 'ar') ?
                                         $hall -> name_ar : $hall -> name_en}}</li>
                                @endforeach

                            </ul>
                        </div>
                    </div>


                    <div class="row portfolio-container" style="margin: 10px; display: flex;align-items: center;"
                         data-aos="fade-up" data-aos-delay="100">
                        @foreach($tables as $table)

                            <div class="col-lg-2 col-md-4 col-4 portfolio-item  table-div .{{$table -> hall_id}}">
                                <div
                                    class="portfolio-wrap tables {{$table -> available == 1 ? 'available' : 'notAvailable'}}"
                                    onclick="selectTable(this , {{$table}})" id="{{$table -> id}}">

                                    <label
                                        class="table-name {{ Config::get('app.locale') == 'ar' ?  'name_ar' : 'name_en' }}">{{ Config::get('app.locale') == 'ar' ? $table -> name_ar : $table -> name_en}}</label>

                                </div>
                            </div>

                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
