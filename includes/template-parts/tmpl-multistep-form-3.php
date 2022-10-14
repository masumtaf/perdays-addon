<div class="pdn-container">
    <div class="card">
        <div class="form">
            <div class="left-side">
                <div class="left-heading">
                    <h3>indeed</h3>
                </div>
                <div class="steps-content">
                    <h3>Step <span class="step-number">1</span></h3>
                    <p class="step-number-content active">Enter your personal information to get closer to companies.</p>
                    <p class="step-number-content d-none">Get to know better by adding your diploma,certificate and education life.</p>
                    <p class="step-number-content d-none">Help companies get to know you better by telling then about your past experiences.</p>
                    <p class="step-number-content d-none">Add your profile piccture and let companies find youy fast.</p>
                </div>
                <ul class="progress-bar">
                    <li class="active">Personal Information</li>
                    <li>Product </li>
                    <li>Work Experience</li>
                    <li>User Photo</li>
                </ul>
                

                
            </div>
            <div class="right-side">
                <div class="main active">
                    <small><i class="fa fa-smile-o"></i></small>
                    <div class="text">
                        <h2>Your Personal Information</h2>
                        <p>Enter your personal information to get closer to copanies.</p>
                    </div>
                    <div class="input-text">
                        <div class="input-div">
                            <input type="text" required require id="user_name">
                            <span>First Name</span>
                        </div>
                        <div class="input-div"> 
                            <input type="text" required>
                            <span>Last Name</span>
                        </div>
                    </div>
                    <div class="input-text">
                        <div class="input-div">
                            <input type="tel" required require>
                            <span>Phone number</span>
                        </div>
                        <div class="input-div">
                            <input type="email" required require>
                            <span>E-mail Address</span>
                        </div>
                    </div>
                    <div class="input-text">
                        <textarea name="your-message" cols="40" rows="10" class="textarea" aria-invalid="false" placeholder="Address" spellcheck="false"></textarea>
                    </div>
                  
                    <div class="buttons">
                        <button class="next_button">Next Step</button>
                    </div>
                </div>
                <div class="main">
         
                    <div class="text">
                        <h2>Select Products</h2>

                    </div>
                    <div class="">
                        <div class="input-div">
                            <?php get_product_in_select('product') ;?>
                        </div>
                  
                    </div>
                    <div class="buttons button_space">
                        <button class="back_button">Back</button>
                        <button class="next_button">Next Step</button>
                    </div>
                </div>
                <div class="main">
                    <small><i class="fa fa-smile-o"></i></small>
                    <div class="text">
                        <h2>Work Experiences</h2>
                        <p>Can you talk about your past work experience?</p>
                    </div>
                    <div class="input-text">
                        <div class="input-div">
                            <input type="text" required require>
                            <span>Experience 1</span>
                        </div>
                        <div class="input-div"> 
                            <input type="text" required require>
                            <span>Position</span>
                        </div>
                    </div>
                    <div class="input-text">
                        <div class="input-div">
                            <input type="text" required>
                            <span>Experience 2</span>
                        </div>
                        <div class="input-div">
                            <input type="text" required>
                            <span>Position</span>
                        </div>
                    </div>
                    <div class="input-text">
                        <div class="input-div">
                            <input type="text" required>
                            <span>Experience 3</span>
                        </div>
                        <div class="input-div">
                            <input type="text" required>
                            <span>Position</span>
                        </div>
                    </div>
                    <div class="buttons button_space">
                        <button class="back_button">Back</button>
                        <button class="next_button">Next Step</button>
                    </div>
                </div>
                
                
                
                <div class="main">
                    <small><i class="fa fa-smile-o"></i></small>
                    <div class="text">
                        <h2>User Photo</h2>
                        <p>Upload your profile picture and share yourself.</p>
                    </div>
                    <div class="user_card">
                        <span></span>
                        <div class="circle">
                            <span><img src="https://i.imgur.com/hnwphgM.jpg"></span>
                            
                        </div>
                        <div class="social">
                            <span><i class="fa fa-share-alt"></i></span>
                            <span><i class="fa fa-heart"></i></span>
                            
                        </div>
                        <div class="user_name">
                            <h3>Peter Hawkins</h3>
                            <div class="detail">
                                <p><a href="#">Izmar,Turkey</a>Hiring</p>
                                <p>17 last day . 94Apply</p>
                            </div>
                        </div>
                    </div>
                    <div class="buttons button_space">
                        <button class="back_button">Back</button>
                        <button class="submit_button">Submit</button>
                    </div>
                </div>
                 <div class="main">
                     <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                         <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
                        <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                    </svg>
                     
                    <div class="text congrats">
                        <h2>Congratulations!</h2>
                        <p>Thanks Mr./Mrs. <span class="shown_name"></span> your information have been submitted successfully for the future reference we will contact you soon.</p>
                    </div>
                </div>
                
            
              

            

            </div>
        </div>
    </div>
</div>