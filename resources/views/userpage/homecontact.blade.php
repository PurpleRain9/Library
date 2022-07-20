<section class="section-four">
    <div class="container">
        <div class="contact-title-div text-center">
            <h2 class="contact-title">Contact Us</h2>
            <div class="out-line"></div>
        </div>
        <div class="card mt-3 form-card-div">
            @if (session('contact'))
                <div class="alert alert-success">
                    <h1 class="text-center">{{ session('contact') }}</h1>
                </div>
            @endif
            <form action="{{ url('/user-contact-up') }}" method="POST">
                @csrf
                <div class="d-flex row p-5 form-card">
                    <div class="form-group col-md-6">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control"
                            placeholder="Enter your name"/>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control"
                            placeholder="Enter your email" value=""/>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="phone">Phone</label>
                        <input type="phone" name="phone" id="phone" class="form-control"
                            placeholder="Enter your phone" />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="address">Address</label>
                        <input type="text" name="address" id="address" class="form-control"
                            placeholder="Enter your address" />
                    </div>
                    <div class="form-group col-md-12">
                        <label for="message">Message</label>
                        <textarea name="message" id="message" cols="5" class="form-control" placeholder="Enter your message"></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Contact</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</section>
