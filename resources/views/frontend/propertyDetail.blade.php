
@extends('frontend.main.main')
@section('content_front')

        <!--Apartments-Section-->
        <section class="apartment">
            <div class="container">
                <div class="apartment-inner">
                    <div class="apartment-inner-head">
                        <div class="apartment-breadcumb">
                            <a href="{{ route('home') }}">Home ›</a> <a href="{{ route('listProperty',['id'=>encrypt($property->type_id)]) }}">{{ $property->type }}</a></span> › {{ $property->porperty_name }}
                        </div>
                    </div>
                    <div class="apartment-single-bottom">
                        <div class="apartment-bottom-content">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="apartment-single-left">
                                        <div class="apartment-single-left-inner">
                                            <div class="apartment-single-slider-main">
                                                <div class="apart-meni-slider-thumbnil">
                                                    <div class="prevContainer">
                                                        <a class="prev" onclick="plusSlides(-1)">
                                                            <i class="fa-solid fa-angle-up"></i>
                                                        </a>
                                                    </div>
                                                    <div class="apartment-slider-column">
                                                        @php $i = 1; @endphp
                                                        @foreach ($property->images as $key => $image)
                                                        <div class="column">
                                                            <img class="slide-thumbnail" src="{{ asset('storage/' . $image) }}" onclick="currentSlide({{ $i }})" alt="Caption One" />
                                                        </div>
                                                        @php $i++; @endphp
                                                        @endforeach
                                                        {{-- <div class="column">
                                                            <img class="slide-thumbnail" src="{{ asset('images/apart-two.png') }}" onclick="currentSlide(2)" alt="Caption Two" />
                                                        </div>
                                                        <div class="column">
                                                            <img class="slide-thumbnail" src="{{ asset('images/apart-three.png') }}" onclick="currentSlide(3)" alt="Caption Three" />
                                                        </div>
                                                        <div class="column">
                                                            <img class="slide-thumbnail" src="{{ asset('images/apart-four.png') }}" onclick="currentSlide(4)" alt="Caption Four" />
                                                        </div>
                                                        <div class="column">
                                                            <img class="slide-thumbnail" src="{{ asset('images/apart-four.png') }}" onclick="currentSlide(5)" alt="Caption Five" />
                                                        </div> --}}
                                                    </div>
                                                </div>
                                                <div class="holder">
                                                    @foreach ($property->images as $image)
                                                    <div class="slides">
                                                        <img  src="{{ asset('storage/' . $image) }}" alt="" />
                                                    </div>
                                                    @endforeach
                                                    {{-- <div class="slides">
                                                        <img src="{{ asset('images/apart-two.png') }}" />
                                                    </div>

                                                    <div class="slides">
                                                        <img src="{{ asset('images/apart-three.png') }}" />
                                                    </div>

                                                    <div class="slides">
                                                        <img src="{{ asset('images/apart-four.png') }}" />
                                                    </div>

                                                    <div class="slides">
                                                        <img src="{{ asset('images/apart-four.png') }}" />
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="apartment-single-right">
                                        <div class="apartment-single-right-head">
                                            <div class="apart-emi">
                                                <button type="button" class="emi-btn">
                                                    Popular
                                                </button>
                                                <h2>₹{{ $property->price }}</h2>
                                                <p>Estimated EMI $ 1,970</p>
                                            </div>
                                            <div class="emi-dashline"></div>
                                            <div class="apart-haven">
                                                <h3>{{ $property->porperty_name }}</h3>
                                                <p>{{ $property->property_location }}</p>
                                            </div>
                                        </div>
                                        <div class="apartment-single-facility">
                                            <ul class="apartment-single-facility-inner">
                                                <li>
                                                    <div class="apartment-single-facility-content">
                                                        <span class="apartment-area">
                                                            <img src="{{ asset('images/data-one.png') }}" />
                                                            Area
                                                        </span>
                                                        <div class="super-built">
                                                            <h3>{{ $property->area }}sq/ft.</h3>
                                                            {{-- <div class="super-built-select">
                                                                <select class="form-select" aria-label="Default select example">
                                                                    <option selected>sq.yards</option>
                                                                    <option value="one">One</option>
                                                                    <option value="two">Two</option>
                                                                    <option value="three">Three</option>
                                                                </select>
                                                                <span class="yards-icon"><i class="fa-solid fa-angle-down"></i></span>
                                                            </div> --}}
                                                        </div>
                                                        {{-- <span class="area-size">(334.45 sq.m.)</span> --}}
                                                    </div>
                                                     <div class="apartment-single-facility-content">
                                                        <span class="apartment-area">
                                                            <img src="{{ asset('images/data-two.png') }}" />
                                                            Configuration
                                                        </span>
                                                        <div class="super-built">
                                                            <h3>{{ $property->bedroom }} Bedroom , {{ $property->bathroom }}  Bathroom</h3>

                                                        </div>

                                                    </div>
                                                </li>
                                                 <li>
                                                    <div class="apartment-single-facility-content">
                                                        <span class="apartment-area">
                                                            <img src="{{ asset('images/data-three.png') }}" />
                                                           Price
                                                        </span>
                                                        <div class="super-built">
                                                            <h3>$ 5,970+ Govt Charges & Tax @ 2,75,000 per sq.yards (All inclusive,Negotiable)<span class="view-price">View Price Details</span></h3>
                                                    </div>
                                                </div>
                                                     <div class="apartment-single-facility-content">
                                                        <span class="apartment-area">
                                                            <img src="{{ asset('images/data-four.png') }}" />
                                                            Address
                                                        </span>
                                                        <div class="super-built">
                                                            <h3>{{ $property->property_location }} </h3>

                                                        </div>

                                                    </div>
                                                </li>
                                                 <li>
                                                    <div class="apartment-single-facility-content">
                                                        <span class="apartment-area">
                                                            <img src="{{ asset('images/data-five.png') }}" />
                                                           Floor Number
                                                        </span>
                                                        <div class="super-built">
                                                            <h3>3rd of 4 Floors</h3>

                                                    </div>
                                                </div>
                                                     <div class="apartment-single-facility-content">
                                                        <span class="apartment-area">
                                                            <img src="{{ asset('images/data-six.png') }}" />
                                                            Facing
                                                        </span>
                                                        <div class="super-built">
                                                            <h3>East</h3>

                                                        </div>

                                                    </div>
                                                </li>
                                                 <li>
                                                    <div class="apartment-single-facility-content">
                                                        <span class="apartment-area">
                                                            <img src="{{ asset('images/data-seven.png') }}" />
                                                            Overlooking
                                                        </span>
                                                        <div class="super-built">
                                                            <h3>Park/Garden</h3>
                                                            <div class="super-built-select">

                                                    </div>
                                                </div>
                                            </div>
                                                     <div class="apartment-single-facility-content">
                                                        <span class="apartment-area">
                                                            <img src="{{ asset('images/data-eight.png') }}" />
                                                            Property Age
                                                        </span>
                                                        <div class="super-built">
                                                            <h3>0 to 1 Year Old</h3>

                                                        </div>

                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Consider-Section-->
        <section class="consider">
            <div class="container">
                <div class="consider-inner">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="consider-left">
                            <div class="consider-content">
                                <h2>Why you should consider this property?</h2>
                                <div class="key-highlight">
                                    <div class="key-highlight-left">
                                        <figure>
                                            <img src="{{ asset('images/verify.png') }}">
                                        </figure>
                                            <h3>Key Highlights</h3>
                                            <p>of the property</p>
                                    </div>
                                    <div class="key-highlight-right">
                                    <div class="key-highlight-right-inner">
                                        <ul class="key-highlight-right-content">
                                            <li>
                                                <a href="javascript::" class="east-facing"><i class="fa-solid fa-check"></i> East Facing</a>
                                                <a href="javascript::" class="east-facing"><i class="fa-solid fa-check"></i> Fresh Construction</a>
                                            </li>
                                            <li>
                                                <a href="javascript::" class="east-facing"><i class="fa-solid fa-check"></i> Private Garden</a>
                                                <a href="javascript::" class="east-facing"><i class="fa-solid fa-check"></i> Gated Society</a>
                                            </li>
                                            <li>
                                                <a href="javascript::" class="east-view-more">View 10  More </a>
                                            </li>
                                        </ul>
                                    </div>

                                    </div>
                                </div>
                            </div>
                            <div class="ownership">
                                <ul class="ownership-inner">
                                    <li>Property Ownership <span class="ownership-content"> : Freehold</span></li>
                                    <li>Flooring <span class="ownership-content"> : Marble</span></li>
                                    <li>Furnishing <span class="ownership-content"> : Semifurnished</span></li>
                                    <li>Width of facing road <span class="ownership-content"> : 50.0 Feet</span></li>
                                    <li>Gated Community <span class="ownership-content"> : Yes</span></li>
                                    <li>Parking <span class="ownership-content"> : 3 Covered, 1 Open</span></li>
                                    <li>WheelChair Friendly <span class="ownership-content"> : Yes</span></li>
                                    <li>Pet Friendly <span class="ownership-content"> : Yes</span></li>
                                    <li>Water Source <span class="ownership-content"> : Municipal corporati…</span></li>
                                    <li>Power Backup <span class="ownership-content"> : Full</span></li>
                                    <li>Property Code <span class="ownership-content"> : B61034878</span></li>
                                </ul>
                            </div>
                            <div class="about-property">
                                <div class="about-property-inner">
                                    <h4>About Property</h4>
                                     <div class="about-property-content">
                                    <address><b>Address:</b>Anand Lok, South Delhi, Delhi</address>
                                    <p>Brand new , ready to move , park facing , builder floor available on sale in anand lok , located on third floor with terrace garden with exclusive lift available, 4 spacious bedrooms with attached bathrooms , drawing , dining attached bath , modular kitchen, italian marble and wooden flooring , More >></p>
                                </div>
                                </div>
                            </div>
                            <div class="facts">
                                <div class="facts-inner">
                                    <div class="facts-head">
                                        <h4>Facts and Features</h4>
                                        <p>Furnishing Details</p>
                                    </div>
                                    <div class="facts-bottom">
                                        <ul class="facts-bottom-inner">
                                            <li>
                                                <img src="{{ asset('images/facts-one.png') }}">
                                                <span class="facts-bottom-content">2 Wardrobe</span>
                                            </li>
                                            <li>
                                                <img src="{{ asset('images/facts-two.png') }}">
                                                <span class="facts-bottom-content">1 Water Purifier</span>
                                            </li>
                                            <li>
                                                <img src="{{ asset('images/facts-three.png') }}">
                                                <span class="facts-bottom-content">6 Fan</span>
                                            </li>
                                            <li>
                                                <img src="{{ asset('images/facts-four.png') }}">
                                                <span class="facts-bottom-content">1 Exhaust Fan</span>
                                            </li>
                                            <li>
                                                <img src="{{ asset('images/facts-five.png') }}">
                                                <span class="facts-bottom-content">4 Geyser</span>
                                            </li>
                                            <li>
                                                <img src="{{ asset('images/facts-six.png') }}">
                                                <span class="facts-bottom-content">17 Light</span>
                                            </li>
                                            <li>
                                                <img src="{{ asset('images/facts-seven.png') }}">
                                                <span class="facts-bottom-content">5 AC</span>
                                            </li>
                                            <li>
                                                <img src="{{ asset('images/facts-eight.png') }}">
                                                <span class="facts-bottom-content">1 Modular Kitchen</span>
                                            </li>
                                            <li>
                                                <img src="{{ asset('images/facts-nine.png') }}">
                                                <span class="facts-bottom-content">1 Chimney</span>
                                            </li>
                                            <li>
                                                <img src="{{ asset('images/facts-ten.png') }}">
                                                <span class="facts-bottom-content">No Bed</span>
                                            </li>
                                            <li>
                                                <img src="{{ asset('images/facts-eleven.png') }}">
                                                <span class="facts-bottom-content">No Dining Table</span>
                                            </li>
                                            <li>
                                                <img src="{{ asset('images/facts-twelfth.png') }}">
                                                <span class="facts-bottom-content">No Fridge</span>
                                            </li>
                                            <li>
                                                <img src="{{ asset('images/facts-thirty.png') }}">
                                                <span class="facts-bottom-content">No Sofa</span>
                                            </li>
                                            <li>
                                                <img src="{{ asset('images/facts-forty.png') }}">
                                                <span class="facts-bottom-content">No Stove</span>
                                            </li>
                                            <li>
                                                <img src="{{ asset('images/facts-fifty.png') }}">
                                                <span class="facts-bottom-content">No TV</span>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="facts">
                                <div class="facts-inner">
                                    <div class="facts-head">
                                        <h4>Amenities</h4>
                                    </div>
                                    <div class="facts-bottom">
                                        <ul class="facts-bottom-inner">
                                            <li>
                                                <img src="{{ asset('images/item-one.png') }}">
                                                <span class="facts-bottom-content">Security / Fire Alarm</span>
                                            </li>
                                            <li>
                                                <img src="{{ asset('images/item-two.png') }}">
                                                <span class="facts-bottom-content">Feng Shui / Vaastu Compliant</span>
                                            </li>
                                            <li>
                                                <img src="{{ asset('images/item-three.png') }}">
                                                <span class="facts-bottom-content">Private Garden / Terrace</span>
                                            </li>
                                            <li>
                                                <img src="{{ asset('images/item-four.png') }}">
                                                <span class="facts-bottom-content">Intercom Facility</span>
                                            </li>
                                            <li>
                                                <img src="{{ asset('images/item-five.png') }}">
                                                <span class="facts-bottom-content">Water purifier</span>
                                            </li>
                                            <li>
                                                <img src="{{ asset('images/item-six.png') }}">
                                                <span class="facts-bottom-content">Lift(s)</span>
                                            </li>
                                            <li>
                                                <img src="{{ asset('images/item-seven.png') }}">
                                                <span class="facts-bottom-content">Maintenance Staff</span>
                                            </li>
                                            <li>
                                                <img src="{{ asset('images/item-eight.png') }}">
                                                <span class="facts-bottom-content">Water Storage</span>
                                            </li>
                                            <li>
                                                <img src="{{ asset('images/item-nine.png') }}">
                                                <span class="facts-bottom-content">Bank Attached Property</span>
                                            </li>
                                            <li>
                                                <img src="{{ asset('images/item-ten.png') }}">
                                                <span class="facts-bottom-content">Piped-gas</span>
                                            </li>
                                            <li>
                                                <img src="{{ asset('images/item-eleven.png') }}">
                                                <span class="facts-bottom-content">Park</span>
                                            </li>
                                            <li>
                                                <img src="{{ asset('images/item-twelfth.png') }}">
                                                <span class="facts-bottom-content">Security Personnel</span>
                                            </li>
                                            <li>
                                                <img src="{{ asset('images/item-thirty.png') }}">
                                                <span class="facts-bottom-content">Natural Light</span>
                                            </li>
                                            <li>
                                                <img src="{{ asset('images/item-thirty.png') }}">
                                                <span class="facts-bottom-content">Airy Rooms</span>
                                            </li>
                                            <li>
                                                <img src="{{ asset('images/item-thirty.png') }}">
                                                <span class="facts-bottom-content">Spacious Interiors</span>
                                            </li>
                                            <li>
                                                <img src="{{ asset('images/item-forty.png') }}">
                                                <span class="facts-bottom-content">Waste Disposal</span>
                                            </li>
                                            <li>
                                                <img src="{{ asset('images/item-fifty.png') }}">
                                                <span class="facts-bottom-content">Rain Water Harvesting</span>
                                            </li>
                                            <li>
                                                <img src="{{ asset('images/item-sixty.png') }}">
                                                <span class="facts-bottom-content">Club house / Community Center</span>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                           </div>

                        </div>
                         <div class="col-md-3">
                            <div class="consider-right">
                            <div class="consider-right-content">
                                <figure>
                                    <img src="{{ asset('images/call.png') }}">
                                </figure>
                                <h2>Contact our Real Estate Experts</h2>
                            </div>
                            <form class="consider-form">
                                <div class="consider-form-inner">
                                    <input type="text" name="Name" placeholder="Full Name">
                                </div>
                                 <div class="consider-form-inner">
                                    <input type="email" name="email" placeholder="Email ID">
                                </div>
                                <div class="consider-form-inner">
                                    <input type="number" name="Number" placeholder="Phone Number">
                                </div>
                                <div class="consider-form-inner">
                                    <select class="form-select" aria-label="Default select example">
                                    <option selected>Location</option>
                                    <option value="Jaipur">Jaipur</option>
                                    <option value="Jodhpur">Jodhpur</option>
                                    <option value="Pali">Pali</option>
                                    </select>
                                    <span class="consider-form-select"><i class="fa-solid fa-angle-down"></i></span>
                                </div>
                                 <div class="consider-form-wepper">
                                     <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Enable Updates through </label>
                                        <a href="javascript::" class="consider-whatsApp">
                                            <img src="{{ asset('images/whatsapp.png') }}"> WhatsApp
                                        </a href="javascript::">
                                </div>
                                 <div class="consider-form-inner">
                                    <button type="submit" class="consider-btn">Contact Now</button>
                                </div>

                            </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Dubai-mania-Section-->
        <section class="dubai-mania p-0">
            <div class="container">
                <div class="dubai-mania-inner">
                    <div class="dubai-mania-head">
                        <h2>Similar Properties You May Like</h2>
                    </div>
                    <div class="dubai-mania-bottom">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="project-slider-wapper">
                                    <div class="project-slider-wapper-head">
                                        <figure>
                                            <img src="{{ asset('images/project-three.png') }}">
                                        </figure>
                                        <div class="project-slider-wapper-status discounted-price">
                                            <svg width="14" height="23" viewBox="0 0 14 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9.03064 9.83836H9.03008H4.96992C4.48037 9.83836 4.01087 9.64389 3.6647 9.29772C3.31854 8.95156 3.12406 8.48206 3.12406 7.99251C3.12406 7.50295 3.31854 7.03345 3.6647 6.68729C4.01087 6.34112 4.48037 6.14665 4.96992 6.14665H11.4662H11.9662V5.64665V4.02258V3.52258H11.4662H8.51504V1V0.5H8.01504H6.39098H5.89098V1V3.52258H4.96992C3.78442 3.52258 2.64748 3.99352 1.80921 4.83179C0.970936 5.67007 0.5 6.80701 0.5 7.99251C0.5 9.178 0.970937 10.3149 1.80921 11.1532C2.64748 11.9915 3.78442 12.4624 4.96992 12.4624H9.02952C9.51905 12.463 9.98838 12.6577 10.3345 13.0038C10.6807 13.35 10.8754 13.8193 10.8759 14.3088V14.4882C10.8754 14.9777 10.6807 15.4471 10.3345 15.7932C9.98838 16.1394 9.51905 16.3341 9.02952 16.3346H2.15791H1.65791V16.8346V18.4587V18.9587H2.15791H5.89098V21.3008V21.8008H6.39098H8.01504H8.51504V21.3008V18.9587H9.03008H9.03064C10.2156 18.9573 11.3516 18.486 12.1895 17.6482C13.0274 16.8103 13.4987 15.6743 13.5 14.4893V14.4888V14.3083V14.3077C13.4987 13.1228 13.0274 11.9868 12.1895 11.1489C11.3516 10.311 10.2156 9.8397 9.03064 9.83836Z" fill="#00CE3A" stroke="#00CE3A"></path>
                                            </svg>
                                            Discounted Price
                                        </div>
                                    </div>
                                    <div class="project-slider-wapper-bottom">
                                        <h3>$ 3,450</h3>
                                        <h4>Charming Cottage in the Meadow</h4>
                                        <p>1508 Centennial Farm RoadHarlan, 51537</p>
                                        <div class="project-facility">
                                            <div class="project-beds">
                                                <svg width="30" height="22" viewBox="0 0 30 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M25 4.5H12V12.0387H10.6154V9.47619C10.6138 8.02433 10.0363 6.63239 9.00971 5.60575C7.9831 4.57912 6.59117 4.00164 5.13931 4H2V0H0V21.5H2V18.5161L28 18.7241V21.5H30V9.5C29.9985 8.17438 29.4712 6.90348 28.5339 5.96613C27.5965 5.02877 26.3256 4.5015 25 4.5ZM2 6H5.13931C6.0609 6.00104 6.94445 6.3676 7.59611 7.01927C8.24777 7.67093 8.61433 8.55447 8.61537 9.47606V12.0386H2V6ZM28 16.724L2 16.516V14.0387H28V16.724ZM28 12.0387H14V6.5H25C25.7954 6.50091 26.5579 6.81727 27.1203 7.37968C27.6827 7.9421 27.9991 8.70463 28 9.5V12.0387Z" fill="#2B2B2B"></path>
                                                </svg>
                                                4 Beds
                                            </div>
                                            <div class="project-beds">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M22.4 13.2596H3.2V4.25964C3.19907 3.9207 3.26538 3.58495 3.39509 3.27182C3.5248 2.95868 3.71533 2.67439 3.95565 2.43538L3.97565 2.41539C4.35228 2.03931 4.83584 1.78868 5.36026 1.69774C5.88468 1.6068 6.42438 1.67998 6.90565 1.90728C6.45114 2.66298 6.26222 3.5489 6.36892 4.42427C6.47562 5.29965 6.87181 6.11425 7.49455 6.73864L8.0421 7.28619L7.03425 8.29409L8.16555 9.42539L9.1734 8.41754L14.7579 2.83318L15.7657 1.82533L14.6344 0.693985L13.6264 1.70184L13.0789 1.15429C12.4233 0.50055 11.5592 0.0975642 10.637 0.0155515C9.71481 -0.0664612 8.79309 0.177699 8.03245 0.705485C7.23036 0.198942 6.27983 -0.0197366 5.33702 0.0853734C4.39422 0.190483 3.51519 0.613131 2.84435 1.28389L2.82435 1.30388C2.43497 1.69113 2.12627 2.15177 1.91611 2.65912C1.70595 3.16648 1.59851 3.71048 1.6 4.25964V13.2596H0V14.8596H1.6V16.3946C1.59997 16.5236 1.62077 16.6517 1.6616 16.7741L3.15 21.2391C3.22943 21.4781 3.38216 21.6861 3.5865 21.8334C3.79084 21.9807 4.0364 22.0598 4.2883 22.0596H4.9333L4.35 24.0596H6.01665L6.6 22.0596H17.005L17.605 24.0596H19.275L18.675 22.0596H19.7115C19.9634 22.0599 20.209 21.9807 20.4134 21.8334C20.6178 21.6861 20.7706 21.4782 20.85 21.2391L22.3383 16.7741C22.3791 16.6517 22.4 16.5236 22.4 16.3946V14.8596H24V13.2596H22.4ZM8.626 2.28563C9.0668 1.8458 9.66407 1.59878 10.2868 1.59878C10.9095 1.59878 11.5068 1.8458 11.9476 2.28563L12.495 2.83318L9.17355 6.15463L8.626 5.60718C8.18619 5.16638 7.93918 4.56911 7.93918 3.94641C7.93918 3.32371 8.18619 2.72644 8.626 2.28563ZM20.8 16.3296L19.4234 20.4596H4.5766L3.2 16.3296V14.8596H20.8V16.3296Z" fill="#2B2B2B"></path>
                                                </svg>
                                                4 Bath
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="project-slider-wapper">
                                    <div class="project-slider-wapper-head">
                                        <figure>
                                            <img src="{{ asset('images/project-one.png') }}">
                                        </figure>
                                        <div class="project-slider-wapper-status">
                                            <svg width="20" height="23" viewBox="0 0 20 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12.4076 11.2528C12.6672 10.8265 12.9355 10.3857 13.2006 9.93118C14.0877 8.41044 14.2505 6.87814 13.6846 5.37676C12.5427 2.34747 8.72575 0.501751 7.84209 0.207261L7.22073 0L6.25093 1.93998L6.71893 2.32231C6.72417 2.32651 7.244 2.78073 7.27865 3.4693C7.30824 4.0571 6.986 4.69229 6.32112 5.35736C5.8594 5.81904 5.35264 6.26547 4.8161 6.73805C2.55865 8.72608 0 10.98 0 15.2439C0 15.3024 0.000550676 15.3607 0.00165204 15.4185C0.0180119 16.3595 0.2201 17.2879 0.596308 18.1505C0.972516 19.0131 1.51543 19.7928 2.19387 20.445C3.55621 21.7701 5.38285 22.5097 7.28332 22.5056H11.6306L11.0939 21.4166C8.91356 16.9914 10.4555 14.459 12.4076 11.2528Z" fill="#FF1111"></path>
                                                <path d="M19.8227 15.1957C19.8102 15.1458 19.797 15.0957 19.7834 15.0454C19.2384 13.0473 16.2217 10.4781 15.8795 10.1917L15.1924 9.6167L14.7418 10.3912C13.7151 12.1565 12.8339 13.7666 12.4498 15.5933C12.0118 17.6765 12.3066 19.7937 13.3513 22.0661L13.5534 22.5058H14.0669C14.9712 22.5084 15.8641 22.3034 16.6767 21.9065C17.4894 21.5096 18.2 20.9314 18.754 20.2166C19.3045 19.5173 19.6872 18.701 19.8725 17.8305C20.0578 16.96 20.0408 16.0586 19.8227 15.1957Z" fill="#FF1111"></path>
                                            </svg>
                                            Popular
                                        </div>
                                    </div>
                                    <div class="project-slider-wapper-bottom">
                                        <h3>$ 5,970</h3>
                                        <h4>Tranquil Haven in the Woods</h4>
                                        <p>103 Wright CourtBurien, WA 98168</p>
                                        <div class="project-facility">
                                            <div class="project-beds">
                                                <svg width="30" height="22" viewBox="0 0 30 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M25 4.5H12V12.0387H10.6154V9.47619C10.6138 8.02433 10.0363 6.63239 9.00971 5.60575C7.9831 4.57912 6.59117 4.00164 5.13931 4H2V0H0V21.5H2V18.5161L28 18.7241V21.5H30V9.5C29.9985 8.17438 29.4712 6.90348 28.5339 5.96613C27.5965 5.02877 26.3256 4.5015 25 4.5ZM2 6H5.13931C6.0609 6.00104 6.94445 6.3676 7.59611 7.01927C8.24777 7.67093 8.61433 8.55447 8.61537 9.47606V12.0386H2V6ZM28 16.724L2 16.516V14.0387H28V16.724ZM28 12.0387H14V6.5H25C25.7954 6.50091 26.5579 6.81727 27.1203 7.37968C27.6827 7.9421 27.9991 8.70463 28 9.5V12.0387Z" fill="#2B2B2B"></path>
                                                </svg>
                                                4 Beds
                                            </div>
                                            <div class="project-beds">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M22.4 13.2596H3.2V4.25964C3.19907 3.9207 3.26538 3.58495 3.39509 3.27182C3.5248 2.95868 3.71533 2.67439 3.95565 2.43538L3.97565 2.41539C4.35228 2.03931 4.83584 1.78868 5.36026 1.69774C5.88468 1.6068 6.42438 1.67998 6.90565 1.90728C6.45114 2.66298 6.26222 3.5489 6.36892 4.42427C6.47562 5.29965 6.87181 6.11425 7.49455 6.73864L8.0421 7.28619L7.03425 8.29409L8.16555 9.42539L9.1734 8.41754L14.7579 2.83318L15.7657 1.82533L14.6344 0.693985L13.6264 1.70184L13.0789 1.15429C12.4233 0.50055 11.5592 0.0975642 10.637 0.0155515C9.71481 -0.0664612 8.79309 0.177699 8.03245 0.705485C7.23036 0.198942 6.27983 -0.0197366 5.33702 0.0853734C4.39422 0.190483 3.51519 0.613131 2.84435 1.28389L2.82435 1.30388C2.43497 1.69113 2.12627 2.15177 1.91611 2.65912C1.70595 3.16648 1.59851 3.71048 1.6 4.25964V13.2596H0V14.8596H1.6V16.3946C1.59997 16.5236 1.62077 16.6517 1.6616 16.7741L3.15 21.2391C3.22943 21.4781 3.38216 21.6861 3.5865 21.8334C3.79084 21.9807 4.0364 22.0598 4.2883 22.0596H4.9333L4.35 24.0596H6.01665L6.6 22.0596H17.005L17.605 24.0596H19.275L18.675 22.0596H19.7115C19.9634 22.0599 20.209 21.9807 20.4134 21.8334C20.6178 21.6861 20.7706 21.4782 20.85 21.2391L22.3383 16.7741C22.3791 16.6517 22.4 16.5236 22.4 16.3946V14.8596H24V13.2596H22.4ZM8.626 2.28563C9.0668 1.8458 9.66407 1.59878 10.2868 1.59878C10.9095 1.59878 11.5068 1.8458 11.9476 2.28563L12.495 2.83318L9.17355 6.15463L8.626 5.60718C8.18619 5.16638 7.93918 4.56911 7.93918 3.94641C7.93918 3.32371 8.18619 2.72644 8.626 2.28563ZM20.8 16.3296L19.4234 20.4596H4.5766L3.2 16.3296V14.8596H20.8V16.3296Z" fill="#2B2B2B"></path>
                                                </svg>
                                                3 Bath
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="project-slider-wapper">
                                    <div class="project-slider-wapper-head">
                                        <figure>
                                            <img src="{{ asset('images/project-two.png') }}">
                                        </figure>
                                        <div class="project-slider-wapper-status new-listing">
                                            <svg width="20" height="22" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M19.5387 8.55713L10.6731 0.400829C10.3849 0.135674 10.0054 -0.00782393 9.61384 0.000329345C9.2223 0.00848263 8.84906 0.167656 8.57214 0.444579L0.418438 8.59833L0 9.01672V21.037H7.85714V13.537H12.1429V21.037H20V8.98159L19.5387 8.55713Z" fill="#119BFF"></path>
                                            </svg>
                                            New Listing
                                        </div>
                                    </div>
                                    <div class="project-slider-wapper-bottom">
                                        <h3>$ 1,970</h3>
                                        <h4>Serene Retreat by the Lake</h4>
                                        <p>1964 Jehovah Drive, VA 22408</p>
                                        <div class="project-facility">
                                            <div class="project-beds">
                                                <svg width="30" height="22" viewBox="0 0 30 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M25 4.5H12V12.0387H10.6154V9.47619C10.6138 8.02433 10.0363 6.63239 9.00971 5.60575C7.9831 4.57912 6.59117 4.00164 5.13931 4H2V0H0V21.5H2V18.5161L28 18.7241V21.5H30V9.5C29.9985 8.17438 29.4712 6.90348 28.5339 5.96613C27.5965 5.02877 26.3256 4.5015 25 4.5ZM2 6H5.13931C6.0609 6.00104 6.94445 6.3676 7.59611 7.01927C8.24777 7.67093 8.61433 8.55447 8.61537 9.47606V12.0386H2V6ZM28 16.724L2 16.516V14.0387H28V16.724ZM28 12.0387H14V6.5H25C25.7954 6.50091 26.5579 6.81727 27.1203 7.37968C27.6827 7.9421 27.9991 8.70463 28 9.5V12.0387Z" fill="#2B2B2B"></path>
                                                </svg>
                                                3 Beds
                                            </div>
                                            <div class="project-beds">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M22.4 13.2596H3.2V4.25964C3.19907 3.9207 3.26538 3.58495 3.39509 3.27182C3.5248 2.95868 3.71533 2.67439 3.95565 2.43538L3.97565 2.41539C4.35228 2.03931 4.83584 1.78868 5.36026 1.69774C5.88468 1.6068 6.42438 1.67998 6.90565 1.90728C6.45114 2.66298 6.26222 3.5489 6.36892 4.42427C6.47562 5.29965 6.87181 6.11425 7.49455 6.73864L8.0421 7.28619L7.03425 8.29409L8.16555 9.42539L9.1734 8.41754L14.7579 2.83318L15.7657 1.82533L14.6344 0.693985L13.6264 1.70184L13.0789 1.15429C12.4233 0.50055 11.5592 0.0975642 10.637 0.0155515C9.71481 -0.0664612 8.79309 0.177699 8.03245 0.705485C7.23036 0.198942 6.27983 -0.0197366 5.33702 0.0853734C4.39422 0.190483 3.51519 0.613131 2.84435 1.28389L2.82435 1.30388C2.43497 1.69113 2.12627 2.15177 1.91611 2.65912C1.70595 3.16648 1.59851 3.71048 1.6 4.25964V13.2596H0V14.8596H1.6V16.3946C1.59997 16.5236 1.62077 16.6517 1.6616 16.7741L3.15 21.2391C3.22943 21.4781 3.38216 21.6861 3.5865 21.8334C3.79084 21.9807 4.0364 22.0598 4.2883 22.0596H4.9333L4.35 24.0596H6.01665L6.6 22.0596H17.005L17.605 24.0596H19.275L18.675 22.0596H19.7115C19.9634 22.0599 20.209 21.9807 20.4134 21.8334C20.6178 21.6861 20.7706 21.4782 20.85 21.2391L22.3383 16.7741C22.3791 16.6517 22.4 16.5236 22.4 16.3946V14.8596H24V13.2596H22.4ZM8.626 2.28563C9.0668 1.8458 9.66407 1.59878 10.2868 1.59878C10.9095 1.59878 11.5068 1.8458 11.9476 2.28563L12.495 2.83318L9.17355 6.15463L8.626 5.60718C8.18619 5.16638 7.93918 4.56911 7.93918 3.94641C7.93918 3.32371 8.18619 2.72644 8.626 2.28563ZM20.8 16.3296L19.4234 20.4596H4.5766L3.2 16.3296V14.8596H20.8V16.3296Z" fill="#2B2B2B"></path>
                                                </svg>
                                                2 Bath
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="project-slider-wapper">
                                    <div class="project-slider-wapper-head">
                                        <figure>
                                            <img src="{{ asset('images/project-three.png') }}">
                                        </figure>
                                        <div class="project-slider-wapper-status discounted-price">
                                            <svg width="14" height="23" viewBox="0 0 14 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9.03064 9.83836H9.03008H4.96992C4.48037 9.83836 4.01087 9.64389 3.6647 9.29772C3.31854 8.95156 3.12406 8.48206 3.12406 7.99251C3.12406 7.50295 3.31854 7.03345 3.6647 6.68729C4.01087 6.34112 4.48037 6.14665 4.96992 6.14665H11.4662H11.9662V5.64665V4.02258V3.52258H11.4662H8.51504V1V0.5H8.01504H6.39098H5.89098V1V3.52258H4.96992C3.78442 3.52258 2.64748 3.99352 1.80921 4.83179C0.970936 5.67007 0.5 6.80701 0.5 7.99251C0.5 9.178 0.970937 10.3149 1.80921 11.1532C2.64748 11.9915 3.78442 12.4624 4.96992 12.4624H9.02952C9.51905 12.463 9.98838 12.6577 10.3345 13.0038C10.6807 13.35 10.8754 13.8193 10.8759 14.3088V14.4882C10.8754 14.9777 10.6807 15.4471 10.3345 15.7932C9.98838 16.1394 9.51905 16.3341 9.02952 16.3346H2.15791H1.65791V16.8346V18.4587V18.9587H2.15791H5.89098V21.3008V21.8008H6.39098H8.01504H8.51504V21.3008V18.9587H9.03008H9.03064C10.2156 18.9573 11.3516 18.486 12.1895 17.6482C13.0274 16.8103 13.4987 15.6743 13.5 14.4893V14.4888V14.3083V14.3077C13.4987 13.1228 13.0274 11.9868 12.1895 11.1489C11.3516 10.311 10.2156 9.8397 9.03064 9.83836Z" fill="#00CE3A" stroke="#00CE3A"></path>
                                            </svg>
                                            Discounted Price
                                        </div>
                                    </div>
                                    <div class="project-slider-wapper-bottom">
                                        <h3>$ 3,450</h3>
                                        <h4>Charming Cottage in the Meadow</h4>
                                        <p>1508 Centennial Farm RoadHarlan, 51537</p>
                                        <div class="project-facility">
                                            <div class="project-beds">
                                                <svg width="30" height="22" viewBox="0 0 30 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M25 4.5H12V12.0387H10.6154V9.47619C10.6138 8.02433 10.0363 6.63239 9.00971 5.60575C7.9831 4.57912 6.59117 4.00164 5.13931 4H2V0H0V21.5H2V18.5161L28 18.7241V21.5H30V9.5C29.9985 8.17438 29.4712 6.90348 28.5339 5.96613C27.5965 5.02877 26.3256 4.5015 25 4.5ZM2 6H5.13931C6.0609 6.00104 6.94445 6.3676 7.59611 7.01927C8.24777 7.67093 8.61433 8.55447 8.61537 9.47606V12.0386H2V6ZM28 16.724L2 16.516V14.0387H28V16.724ZM28 12.0387H14V6.5H25C25.7954 6.50091 26.5579 6.81727 27.1203 7.37968C27.6827 7.9421 27.9991 8.70463 28 9.5V12.0387Z" fill="#2B2B2B"></path>
                                                </svg>
                                                4 Beds
                                            </div>
                                            <div class="project-beds">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M22.4 13.2596H3.2V4.25964C3.19907 3.9207 3.26538 3.58495 3.39509 3.27182C3.5248 2.95868 3.71533 2.67439 3.95565 2.43538L3.97565 2.41539C4.35228 2.03931 4.83584 1.78868 5.36026 1.69774C5.88468 1.6068 6.42438 1.67998 6.90565 1.90728C6.45114 2.66298 6.26222 3.5489 6.36892 4.42427C6.47562 5.29965 6.87181 6.11425 7.49455 6.73864L8.0421 7.28619L7.03425 8.29409L8.16555 9.42539L9.1734 8.41754L14.7579 2.83318L15.7657 1.82533L14.6344 0.693985L13.6264 1.70184L13.0789 1.15429C12.4233 0.50055 11.5592 0.0975642 10.637 0.0155515C9.71481 -0.0664612 8.79309 0.177699 8.03245 0.705485C7.23036 0.198942 6.27983 -0.0197366 5.33702 0.0853734C4.39422 0.190483 3.51519 0.613131 2.84435 1.28389L2.82435 1.30388C2.43497 1.69113 2.12627 2.15177 1.91611 2.65912C1.70595 3.16648 1.59851 3.71048 1.6 4.25964V13.2596H0V14.8596H1.6V16.3946C1.59997 16.5236 1.62077 16.6517 1.6616 16.7741L3.15 21.2391C3.22943 21.4781 3.38216 21.6861 3.5865 21.8334C3.79084 21.9807 4.0364 22.0598 4.2883 22.0596H4.9333L4.35 24.0596H6.01665L6.6 22.0596H17.005L17.605 24.0596H19.275L18.675 22.0596H19.7115C19.9634 22.0599 20.209 21.9807 20.4134 21.8334C20.6178 21.6861 20.7706 21.4782 20.85 21.2391L22.3383 16.7741C22.3791 16.6517 22.4 16.5236 22.4 16.3946V14.8596H24V13.2596H22.4ZM8.626 2.28563C9.0668 1.8458 9.66407 1.59878 10.2868 1.59878C10.9095 1.59878 11.5068 1.8458 11.9476 2.28563L12.495 2.83318L9.17355 6.15463L8.626 5.60718C8.18619 5.16638 7.93918 4.56911 7.93918 3.94641C7.93918 3.32371 8.18619 2.72644 8.626 2.28563ZM20.8 16.3296L19.4234 20.4596H4.5766L3.2 16.3296V14.8596H20.8V16.3296Z" fill="#2B2B2B"></path>
                                                </svg>
                                                4 Bath
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Bottom-white-space-->
        <div class="bottom-white-space"></div>



        <script>
            $("document").ready(function () {
                $(".verified-btn").click(function () {
                    $(this).toggleClass("verified-done");
                });
            });
        </script>
        <script>
            var slideIndex = 1;
            showSlides(slideIndex);

            function plusSlides(n) {
                showSlides((slideIndex += n));
            }

            function currentSlide(n) {
                showSlides((slideIndex = n));
            }

            function showSlides(n) {
                var i;
                var slides = document.getElementsByClassName("slides");
                var dots = document.getElementsByClassName("slide-thumbnail");
                var captionText = document.getElementById("caption");
                if (n > slides.length) {
                    slideIndex = 1;
                }
                if (n < 1) {
                    slideIndex = slides.length;
                }
                console.log(slideIndex);

                for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";
                    // slides[i].style.display = "inline";
                }
                for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" active", "");
                }
                slides[slideIndex - 1].style.display = "block";
                // slides[slideIndex-1].style.display = "inline";
                dots[slideIndex - 1].className += " active";
                captionText.innerHTML = dots[slideIndex - 1].alt;
            }
        </script>
  @endsection
