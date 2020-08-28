<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/master.css') }}">
        <link rel="stylesheet" href="{{ asset('css/drag&drop.css') }}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <script src="{{asset('js/app.js')}}"></script>
        <script src="{{asset('js/drag&drop.js')}}"></script>
        <link rel="stylesheet" href="{{ asset('css/page_elements1.css') }}">

        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
        <script>
        $( function() {
        $( "#sortable" ).sortable();
        $( "#sortable" ).disableSelection();
        } );
        </script>
        @routes

    </head>
    <body>
        <header class="header-main-profile" style="background-color: white;">
            <div style="flex-grow: 1;"><img style="width: 100px;transform: translateY(-25%);" src="{{ asset('img/logo.png') }}">
            </div>
            <div style="flex-grow: 1;">
                <a type="button" class="btn" href="{{route('user.profile', auth()->user()->slug)}}">Profile</a>

                <button class="btn btn-secondary visible-none js-mobile">Mobile</button>
                <button class="btn btn-secondary visible-none js-desktop">Desktop</button>
            </div>
            <div class="js-link">
                <a href="{{route('logout')}}"><button class="head-link" id="js-info">Log out</button></a>
            </div>
        </header>

        <div style="text-align:center;">
            <!-- <a href="edit-footer.blade.php" data-toggle="modal" data-target="#footer-edit">Lab 6</a> -->
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Add element</button>
            <button type="button" class="btn btn-success d-none js-save-new-order">Save new order</button>
        </div>



        <main class="js-project-preview-elements" id="sortable" style="background-color: white;"><!--style="display: flex;" -->

        </main>
        <input type="hidden" class="js-project-page-element-type-id">
        <input type="hidden" class="js-selected-project-page-element-id">
        <input type="hidden" class="js-project-testimonial-page-element-id">
        <input type="hidden" class="js-project-slug" name="js-project-slug" value="{{$project->slug}}">
        <input type="hidden" class="js-project-id" name="project-id" id="project-id" value="{{$project->id}}">
        <input type="hidden" class="js-project-name" name="project-name" id="project-name" value="{{$project->name}}">
        <input type="hidden" class="js-project-template-id" name="project-template-id" id="project-template-id" value="{{$project->template->id}}">
        <input type="hidden" class="js-project-template-name" name="template-name" id="template-name" value="{{$project->template->name}}">

        <!-- EDIT Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModal">Edit element</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="js-edit js-edit1" style="display:none;">
                            @include('profile.edit-modals.edit-footer')
                        </div>
                        <div class="js-edit js-edit2" style="display:none;">
                            @include('profile.edit-modals.edit-gallery')
                        </div>
                        <div class="js-edit js-edit3" style="display:none;">
                            @include('profile.edit-modals.edit-general1')
                        </div>
                        <div class="js-edit js-edit4" style="display:none;">
                            @include('profile.edit-modals.edit-general2')
                        </div>
                        <div class="js-edit js-edit5" style="display:none;">
                            @include('profile.edit-modals.edit-general3')
                        </div>
                        <div class="js-edit js-edit6" style="display:none;">
                            @include('profile.edit-modals.edit-hero')
                        </div>
                        <div class="js-edit js-edit7" style="display:none;">
                            @include('profile.edit-modals.edit-pricing')
                        </div>
                        <div class="js-edit js-edit8" style="display:none;">
                            @include('profile.edit-modals.edit-subscribe')
                        </div>
                        <div class="js-edit js-edit9" style="display:none;">
                            @include('profile.edit-modals.edit-testimonials')
                        </div>
                        <div class="js-edit js-edit10" style="display:none;">
                            @include('profile.edit-modals.edit-top-menu')
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal  -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Element name</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <span>Select element</span>
                    <select id="select" class="js-get-elements-types-project">
                        <option value="" selected disabled>Choose element</option>
                    </select>

                    <div class="js-modal-content js-content-10">
                        @include('profile.modals.top-menu-modal')
                    </div>

                    <div class="js-modal-content js-content-6">
                        @include('profile.modals.hero-modal')
                    </div>

                    <div class="js-modal-content js-content-3">
                        @include('profile.modals.general1-modal')
                    </div>

                    <div class="js-modal-content js-content-4">
                        @include('profile.modals.general2-modal')
                    </div>

                    <div class="js-modal-content js-content-5">
                        @include('profile.modals.general3-modal')
                    </div>

                    <div class="js-modal-content js-content-8">
                        @include('profile.modals.pricing-modal')
                    </div>

                    <div class="js-modal-content js-content-9">
                        @include('profile.modals.testimonials-modal')
                    </div>

                    <div class="js-modal-content js-content-2">
                        @include('profile.modals.gallery-modal')
                    </div>

                    <div class="js-modal-content js-content-7">
                        @include('profile.modals.subscribe-modal')
                    </div>

                    <div class="js-modal-content js-content-1">
                        @include('profile.modals.footer-modal')
                    </div>

                    </div>

                </div>
            </div>

        </div>

        <script>
            $(document).ready(function(){

                $(document).on("click", ".js-mobile", function() {
                    $("main").css('width','425px');
                    $("main").css('margin','auto');
                    $(".js-pricing-preview").addClass("mobile-preview");
                    $(".col-mar-bot").addClass("tiles-preview");
                    $(".bullets").addClass("d-block");
                    $(".bullets").parent().removeClass("bullets-div");

                });
                $(".js-desktop").click(function() {
                    $(".js-pricing-preview").removeClass("mobile-preview");
                    $(".col-mar-bot").removeClass("tiles-preview");
                    $(".bullets").removeClass("d-block");
                    $(".bullets").parent().addClass("bullets-div");

                    $("main").css('width','100vw');
                    $("main").css('margin','0px');
                });
                $('.js-modal-content').hide();
                $('#select').on("change",function () {
                    var title = $('#select').find(":selected").text();
                    var ide = $('#select').find(":selected").val();
                    let type = $(this).find(':selected').data('id');
                    $('.js-project-page-element-type-id').val(type);
                    $('#exampleModalLabel').text(title)
                    $('.js-modal-content').hide();
                    $('.js-content-'+ide).show();
                });
                $("#exampleModal").on("hidden.bs.modal", function () {
                    $('.js-modal-content').hide();
                    $('#exampleModalLabel').text("Element name")
                    var select = $("#select");
                    select.val(select[0].options[0].value);
                    // $(document).find("select").val("0");
                });
            })

            $(document).ready(function () {

                $.ajax({
                    type: "GET",
                    url: route('page-element-types.show'),
                    success: function (data) {
                        output = [];
                        console.log(data.types);
                        $.each(data.types, function (i, e) {
                            output += '<option data-value="'+ e.id + '" data-id="'+ e.id +'" value="'+e.id +'" id="'+ e.id+'" class="btn-success test1" >'+ e.name + '</option>'
                        });
                        $(".js-get-elements-types-project").append(output)
                    }
                });

            })

            $(document).ready(function(e) {
                $(document).on("click", '.element-edit', function(e){
                    if($(this).has('.js-footer-var')){

                    }
                    x = $(this).attr("data-id")
                    // alert(x)
                    getElementSettingsData(e, x);
                })
                // $(".ui-state-default").mousedown(selectElement())
                // $(".ui-state-default").mouseup(dropElement())



                // $('.js-add-buttons').on("click", function(){

                //     $('.js-added-element').each(function () {
                //         // console.log(`div${index}: ${this.id}`);
                //         // x = `${index}: ${this.id}`;
                //         console.log($('button.element-delete'))
                //         console.log('delay done')
                //         $('.js-added-element').addClass('ui-state-default')
                //         $('.js-added-element').addClass('project-element')
                //         $('button.element-delete').remove();
                //         $('button.element-edit').remove();
                //         $('span.ui-icon-arrowthick-2-n-s').remove();
                //         $('.js-added-element').append('<button class="btn btn-secondary element-delete" style="z-index:+2;">Delete element</button>');
                //         $('.js-added-element').append('<button class="btn btn-secondary element-edit" data-toggle="modal" data-target="#editModal" style="z-index:+2;">Edit element</button>');
                //         $('.js-added-element').append('<span class="ui-icon ui-icon-arrowthick-2-n-s" title="move element" style="position:absolute; top:10px;">');

                //     });
                // })

                window.createButtons = function(elementId){
                    $('.js-added-element').addClass('ui-state-default')
                    $('.js-added-element').addClass('project-element')
                    $('.js-added-element').attr("data-order")
                        if($(".project-element").is(":last-child")){
                        $('.js-added-element').last().attr("data-elementId", elementId);
                        $('.project-element').last().append('<button class="btn btn-secondary element-delete" data-id="'+ elementId +'" style="z-index:+2;">Delete element</button>');
                        $('.project-element').last().append('<button class="btn btn-secondary element-edit" data-id="'+ elementId +'" data-toggle="modal" data-target="#editModal" style="z-index:+2;">Edit element</button>');
                        $('.project-element').last().append('<span class="ui-icon ui-icon-arrowthick-2-n-s" title="move element" style="position:absolute; top:10px;">');
                        // $('.project-element').last().append('<input type="hidden" class="element-id">');
                        // elementId = elementId;
                        // $('.element-id').val(elementId);
                        console.log('element-id: ' + elementId);
                        }

                    $(document).on("click", ".element-delete", function(e){
                        $('.js-selected-project-page-element-id').val($(this).attr('data-id'));
                        deleteProjectElement(e);
                    })

                    $(document).on("click", ".element-edit", function(e){
                        $('.js-selected-project-page-element-id').val($(this).attr('data-id'));
                    })

                    $('.js-added-element').each(function(index, value) {
                        console.log(`div${index}: ${this.id}`);
                        let x = index + 1;
                        $(this).attr("data-order", x);
                    });
                }

                $('.js-save-new-order').click(function (e) {

                    $(".js-pricing-preview").removeClass("mobile-preview");
                    $(".col-mar-bot").removeClass("tiles-preview");
                    $(".bullets").removeClass("d-block");
                    $(".bullets").parent().addClass("bullets-div");

                    $('.js-added-element').each(function() {

                        let elementId = $(this).attr("data-elementId");
                        let render_order = $(this).attr("data-order");

                        updateProjectElementRenderOrderValue(e, render_order, elementId);
                    })

                });

            });
            $('.js-reviews div:first').addClass('active');
            $(document).on("mousedown", ".ui-state-default", selectElement);
            $(document).on("mouseup", dropElement);
            $(document).ready(function(){
                $('.js-edit').hide();
                $(document).on("click", ".element-edit", function(){
                    $(".js-edit").hide();
                    if($(this).parent().hasClass("js-footer-var")){
                        $(".js-edit1").show();
                    }
                    if($(this).parent().hasClass("js-gallery-var")){
                        $(".js-edit2").show();
                    }
                    if($(this).parent().hasClass("js-content1-var")){
                        $(".js-edit3").show();
                    }
                    if($(this).parent().hasClass("js-content2-var")){
                        $(".js-edit4").show();
                    }
                    if($(this).parent().hasClass("js-content3-var")){

                        setTimeout(function () {

                            // add dropdown to every tile with unique class
                            $('.js-project-edit-general-content-three-tiles').each(function (e, i) {

                                let iconId = $('.js-project-edit-general-content-three-tile-object-' + (e + 1)).val();
                                if ( $(this).children().length == 3 ) {
                                    console.log($(this).children().length)
                                    setAwesomeIconValue($(this), e, iconId);
                                } else{
                                    return;
                                }

                            });
                        }, 1000);

                        $(".js-edit5").show();
                    }
                    if($(this).parent().hasClass("js-hero-var")){
                        $(".js-edit6").show();
                    }
                    if($(this).parent().hasClass("js-pricing-var")){
                        $(".js-edit7").show();
                        if($(".js-project-pricing-number").val() == "1"){
                            $(".js-project-edit-pricing-number").val(1);
                            if($(".js-project-edit-pricing-number").val()=="1"){
                                $('.js-project-edit-pricing-1').removeClass('d-none');
                                setTimeout(function () {
                                    $('.js-edit7 :input').each(function() {
                                        if ($(this).val() != '') {
                                            $(this).attr('disabled', false);
                                        }else {
                                        $(this).attr('disabled', true);
                                        }
                                    });
                                }, 3000);
                            }
                        }
                        else if($(".js-project-pricing-number").val()== "2"){
                                $(".js-project-edit-pricing-number").val(2);
                                $('.js-project-edit-pricing-2, .js-project-edit-pricing-1').removeClass('d-none');
                                setTimeout(function () {
                                    $('.js-edit7 :input').each(function() {
                                        if ($(this).val() != '') {
                                            $(this).attr('disabled', false);
                                        }else {
                                        $(this).attr('disabled', true);
                                        }
                                    });
                                }, 3000);
                            }
                        else if($(".js-project-pricing-number").val()== "3"){
                                $(".js-project-edit-pricing-number").val(3);
                                $('.js-project-edit-pricing-3, .js-project-edit-pricing-2, .js-project-edit-pricing-1').removeClass('d-none')
                                setTimeout(function () {
                                    $('.js-edit7 :input').each(function() {
                                        if ($(this).val() != '') {
                                            $(this).attr('disabled', false);
                                        }else {
                                        $(this).attr('disabled', true);
                                        }
                                    });
                                }, 3000);
                            }
                    }
                    if($(this).parent().hasClass("js-newsletter-var")){
                        $(".js-edit8").show();
                    }
                    if($(this).parent().hasClass("js-testimonial-var")){
                        $(".js-edit9").show();
                    }
                    if($(this).parent().hasClass("js-top-menu-var")){
                        $(".js-edit10").show();
                    }
                })
            })
        </script>
    </body>
</html>
