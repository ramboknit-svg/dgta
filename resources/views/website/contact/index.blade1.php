@extends('website.app')
@section('content')

<style nonce="{{ app('cspNonce') }}">
   
   /* Center Alignment for the Form Section */
.section2 {
    display: flex;
    justify-content: center;
    align-items: center;
}
.section1 {
    display: flex;
    justify-content: center;
    align-items: center;
}


/* Page Structure */
.hero-slider {
    height: 390px;
}

.inside-top-mar {
    padding-top: 40px;
}

/* Contact Box */
.sec2contactform {
    background: #ffffff;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 4px 14px rgba(0,0,0,0.08);
}

.sec2frmtitle {
    font-size: 22px;
    margin-bottom: 20px;
    font-weight: 600;
    color: #333;
}

/* Form Inputs */
.sec2contactform input[type="text"],
.sec2contactform input[type="email"],
.sec2contactform select,
.sec2contactform textarea {
    width: 100%;
    padding: 12px 14px;
    margin-bottom: 18px;
    border: 1px solid #ddd;
    border-radius: 6px;
    font-size: 15px;
    color: #333;
    transition: 0.3s;
}

.sec2contactform input:focus,
.sec2contactform select:focus,
.sec2contactform textarea:focus {
    border-color: #4f7cff;
    box-shadow: 0 0 5px rgba(79,124,255,0.3);
}

/* Submit Button */
.sec2contactform input[type="submit"] {
    background: #4f7cff;
    color: #fff;
    padding: 12px 20px;
    border: none;
    width: 180px;
    font-size: 16px;
    cursor: pointer;
    border-radius: 6px;
    transition: 0.3s;
}

.sec2contactform input[type="submit"]:hover {
    background: #3b63d1;
}

/* Alignment Utility */
.col2 {
    width: 48%;
    float: left;
}

.col4 {
    width: 100%;
    float: left;
}

.first {
    margin-right: 4%;
}

.last {
    margin-right: 0;
}

/* Clearfix Fix */
.clearfix::after {
    content: "";
    display: table;
    clear: both;
}

/* Mobile Responsive */
@media(max-width: 768px) {
    .col2 {
        width: 100%;
        margin-right: 0 !important;
    }
}
</style>


<div class="container inside-top-mar">
    <div class="innerwrap">
        
        <section class="section1 textcenter">
            <h2>Drop Us a Mail</h2>
        </section>

        <section class="section2 clearfix">
            <div class="col2 column2 last">

                @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div><br>
                @endif

                <div class="sec2contactform">
                    <h3 class="sec2frmtitle">Want to Know More? Drop Us a Mail</h3>

                    <form action="{{ url('contact_submit') }}" method="post">
                        @csrf

                        <!-- User Type -->
                        <!-- <select name="user_type" class="col4" required>
                            <option value="">Catagory</option>
                            <option value="manager" {{ old('user_type') == 'manager' ? 'selected' : '' }}>Officer</option>
                            <option value="employee" {{ old('user_type') == 'employee' ? 'selected' : '' }}>JCO</option>
                            
                        </select> -->

                        <!-- Department -->
                        <!-- <select name="department" class="col4" required>
                            <option value="">Select Department</option>
                            <option value="hr" {{ old('department') == 'hr' ? 'selected' : '' }}>HR</option>
                            <option value="sales" {{ old('department') == 'sales' ? 'selected' : '' }}>Sales</option>
                            <option value="it" {{ old('department') == 'it' ? 'selected' : '' }}>IT</option>
                            <option value="marketing" {{ old('department') == 'marketing' ? 'selected' : '' }}>Marketing</option>
                        </select> -->
                        <!-- User Type -->
<select name="user_type" id="user_type" class="col4" required>
    <option value="">Category</option>
    <option value="officer">Officer</option>
    <option value="JCO">JCO</option>
</select>

<!-- Department -->
<select name="department" id="department" class="col4" required>
    <option value="">Select Department</option>
</select>

<script nonce="{{ app('cspNonce') }}">
    const departmentSelect = document.getElementById('department');
    const userTypeSelect = document.getElementById('user_type');

    userTypeSelect.addEventListener('change', function () {
        const userType = this.value;

        // Clear old options
        departmentSelect.innerHTML = '<option value="">Select Department</option>';

        // Officer options
        if (userType === 'officer') {
            departmentSelect.innerHTML += '<option value="Lt Col">Lt Col</option>';
            departmentSelect.innerHTML += '<option value="Col">Col</option>';
        }

        // JCO options
        if (userType === 'JCO') {
            departmentSelect.innerHTML += '<option value="Sub">Sub</option>';
            departmentSelect.innerHTML += '<option value="Nb Sub">Nb Sub</option>';
        }
    });
</script>

                        <!-- Name -->
                        <input type="text" class="col4" placeholder="Full Name" name="name"
                            value="{{ old('name') }}" required>

                        <!-- Email + Phone -->
                        <div class="clearfix">
                            <input type="email" class="col2 first" placeholder="Email" name="email"
                                value="{{ old('email') }}" required>

                            <input type="text" class="col2 last" placeholder="Contact Number" name="phone_number"
                                value="{{ old('phone_number') }}" required>
                        </div>

                        
                        <!-- Subject -->
                        <input type="text" class="col4" placeholder="Subject" name="subject"
                            value="{{ old('subject') }}" required>
                            <!-- Rating -->
                        <input type="text" class="col4" placeholder="Rating" name="rating"
                            value="{{ old('rating') }}" required>
                        <!-- Message -->
                        <textarea name="message" rows="7" placeholder="Your Message">{{ old('message') }}</textarea>

                        <!-- Submit Button -->
                        <input type="submit" value="Send">
                    </form>

                </div>
            </div>
        </section>

    </div>
</div>

@endsection

