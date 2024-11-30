<style> .form-basin { font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; padding: 40px 20px 40px 20px; font-size: 16px; font-weight: 400; background-color: transparent; color: #050505; } .form-basin form { margin: auto; max-width: 600px; } .form-basin label { display: block; margin-bottom: 8px; } .form-basin input, .form-basin textarea, .form-basin select { width: 100%; padding: 12px; margin-bottom: 16px; font-family: inherit; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; transition: border-color 0.3s; } .form-basin input:focus, .form-basin textarea:focus, .form-basin select:focus { border-color: #007bff; outline: none; } .form-basin button { background-color: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; font-weight: 500; letter-spacing: 1px; transition: background-color 0.3s; } .form-basin button:hover { filter: brightness(85%); } .form-basin ::placeholder { font-family: inherit; opacity: 0.7; } .form-basin input[type='checkbox'] { margin-right: 8px; width: auto; } .form-basin fieldset { border: 1px solid #ccc; padding: 10px; margin-bottom: 16px; border-radius: 4px; } .form-basin legend { padding: 0 10px; font-weight: bold; font-size: 1em; } .form-basin input[type='radio'] { margin-right: 8px; margin-top: 4px; width: auto; cursor: pointer; } .form-basin .radio-label { display: inline-block; margin-right: 15px; cursor: pointer; } .form-basin .radio-group { margin-bottom: 16px; } .form-basin .donation-type { margin-bottom: 16px; } .form-basin .donation-type span { font-weight: 500; margin-right: 10px; } .form-basin input[type='number'] { -webkit-appearance: textfield; -moz-appearance: textfield; appearance: textfield; } .form-basin input[type='number']::-webkit-inner-spin-button, .form-basin input[type='number']::-webkit-outer-spin-button { -webkit-appearance: none; margin: 0; } .form-basin .form-check { display: flex; align-items: center; margin-bottom: 16px; } .form-basin .form-check-input { margin-top: 14px; margin-right: 10px; cursor: pointer; } .form-basin .form-check-label { margin-bottom: 0; cursor: pointer; }</style>

@extends('main')
<body>

@section('content')
<div class="form-basin">
    <h1 style="text-align: center;">Order Form</h1>
    <div style="text-align: center; color:#535050">Fill up this form</div>
    
  <form action="{{route('conform_order')}}" method="POST">
    @csrf
    <label for="name">Full Name:</label>
    <input type="text" id="name" name="name" placeholder="Your Full Name" value="{{Auth::user()->name}}">

    <label for="email">Email Address:</label>
    <input type="email" id="email" name="email" placeholder="Your Email" value="{{Auth::user()->email}}">

    <label for="email">Phone Number:</label>
    <input type="phone" id="phone" name="phone" placeholder="Your Phone number" value="{{Auth::user()->phone}}">


    <label for="address">Shipping Address:</label>
    <textarea id="address" name="address" placeholder="Your Shipping Address"></textarea>

    <button type="submit">PLACE ORDER</button>
  </form>
</div>

@endsection

</body>

</html>