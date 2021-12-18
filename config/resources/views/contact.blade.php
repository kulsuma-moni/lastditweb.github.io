@extends('layouts.app')

@section('title','Delwarit | Contact')

@section('content')


      <!--Start About Inner Area-->
      <section class="about-wrapper-inner">
         <div class="about-wrap">
            <div class="container">
               <div class="ellipse1">
                  <img src="assets/images/Ellipse1.svg" alt="" class="img-fluid">
               </div>
               <div class="ellipse2">
                  <img src="assets/images/Ellipse2.svg" alt="" class="img-fluid">
               </div>
               <div class="row">
                  <div class="col-lg-12 mx-auto">
                     <div class="inner-content">
                        <h1>Contact Us</h1>
                        <ul>
                           <li><a href="index.html">Home</a></li>
                           <li>/</li>
                           <li>Contact</li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!--End About Inner Area-->
      <!--Start Contact area-->
      <section class="contact-wrapper-area">
         <div class="contact-wrap">
            <div class="container">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="contact-title text-center">
                        <div class="contact-title">
                           <h5>CONTACT US TODAY</h5>
                           <h2>Build beautiful websites today!</h2>
                           <p>There are many variations of passages of Lorem Ipsum
                              available but the majority.
                           </p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row justify-content-center">
                  <div class="col-lg-4 col-md-6 col-sm-6">
                     <div class="contact-service">
                        <div class="contact-icon">
                           <i class="fas fa-phone-volume"></i>
                        </div>
                        <div class="contact-content">
                           <h4>Call us today</h4>
                           <p>01722892349<br>01747724236</p>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-4 col-md-6 col-sm-6">
                     <div class="contact-service">
                        <div class="contact-icon">
                           <i class="fas fa-envelope-open"></i>
                        </div>
                        <div class="contact-content">
                           <h4>Send us email</h4>
                           <p><a href="#0">info.delwarit@gmail.com<br>admin@delwarit.com</a></p>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-4 col-md-6 col-sm-6">
                     <div class="contact-service">
                        <div class="contact-icon">
                           <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="contact-content">
                           <h4>Location</h4>
                           <p>Blue Water Shopping City,Sylhet, Bangladesh</p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="contact-information">
                  <div class="row">
                     <div class="col-lg-6">
                        <div class="contact-area">

						@if(session('success'))
                          <div class="alert alert-success">
                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                              <strong>Success!</strong> {{session('success')}}.
                          </div>
                        @endif
                           <div class="contact-inner">
                              <h5>LETS'S DISCUSS</h5>
                              <h2>Whatever question you have, please feel free to ask.</h2>
                           </div>
                           <form action="{{ route('create.contact') }}" method="post"  id="contactForm">
                           	@csrf
                              <div class="row">
                                 <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                       <!-- <label>Name</label> -->
                                       <input type="text" name="name" id="name" placeholder="Name" class="form-control"  required  oninvalid="this.setCustomValidity('Enter Your Name Here')" oninput="this.setCustomValidity('')">
                                    </div>
                                 </div>
                                 <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                       <!-- <label>Email Address</label> -->
                                       <input type="email" name="email" id="email" placeholder="Email" class="form-control"   required  oninvalid="this.setCustomValidity('Enter Your Valid Email')" oninput="this.setCustomValidity('')">
                                       <div class="help-block with-errors">
                                       </div>
                                    </div>
                                 </div>
                                 <input type="hidden" name="devide" value="1">
                                 <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                       <!-- <label>Subject</label> -->
                                       <input type="text" name="subject" placeholder="Subject" id="msg_subject" class="form-control"   required  oninvalid="this.setCustomValidity('Enter a subject Here')" oninput="this.setCustomValidity('')">
                                       <div class="help-block with-errors">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                       <!-- <label>Message</label> -->
                                       <textarea name="message" class="form-control" placeholder="Message" id="message" rows="5"  required  oninvalid="this.setCustomValidity('Enter a Message Here')" oninput="this.setCustomValidity('')">
                                       </textarea>
                                    </div>
                                 </div>
                                 <div class="col-lg-12 col-md-12">
                                    <button type="submit" class="btn default">Send message <span></span>
                                    </button>
                                 </div>
                              </div>
                           </form>
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="contact-image">
                           <img src="{{ asset('public/frontend/assets/images/contact.png') }}" alt="" class="img-fluid">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!--End Contact area-->
      <section class="map">
         <div class="container-fluid">
            <div class="row">
               <div class="col-lg-12">
                  <div class="map-inner">
                     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3619.0859661628624!2d91.86618891447824!3d24.895049150002638!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x375055acacce36e7%3A0xc262199c88f09443!2sDelwar%20IT!5e0!3m2!1sen!2sbd!4v1638602437429!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                  </div>
               </div>
            </div>
         </div>
      </section>

@endsection