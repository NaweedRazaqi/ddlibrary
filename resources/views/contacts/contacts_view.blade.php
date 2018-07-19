@extends('layouts.main')

@section('content')
<section class="ddl-forms">
    <header>
        <h1>Contac Us</h1>
    </header>
    <div class="content-body">
        @include('layouts.messages')
        <form method="POST" action="{{ route('contact') }}">
        @csrf
        <div class="form-item">
            <label for="name"> 
                <strong>Full Name</strong>
                <span class="form-required" title="This field is required.">*</span>
            </label>
            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" name="name" size="40" maxlength="40" type="text" value="{{ old('name') }}" required autofocus>
            @if ($errors->has('name'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('name') }}</strong>
                </span><br>
            @endif
        </div>
        <div class="form-item">
            <label for="email"> 
                <strong>Email</strong>
                <span class="form-required" title="This field is required.">*</span>
            </label>
            <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" name="email" size="40" maxlength="40" type="email" value="{{ old('email') }}" required>
            @if ($errors->has('email'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('email') }}</strong>
                </span><br>
            @endif
        </div>
        <div class="form-item">
            <label for="subject"> 
                <strong>Subject</strong>
                <span class="form-required" title="This field is required.">*</span>
            </label>
            <input class="form-control{{ $errors->has('subject') ? ' is-invalid' : '' }}" id="subject" name="subject" size="40" maxlength="40" type="text" value="{{ old('subject') }}" required>
            @if ($errors->has('subject'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('subject') }}</strong>
                </span><br>
            @endif
        </div>
        <div class="form-item">
            <label for="message"> 
                <strong>Message</strong>
                <span class="form-required" title="This field is required.">*</span>
            </label>
            <div id="editor">
                <textarea class="form-control{{ $errors->has('message') ? ' is-invalid' : '' }}" name="message" style="height: 200px; width: 325px" required>{{ old('message') }}</textarea>
            </div>
            @if ($errors->has('message'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('message') }}</strong>
                </span><br>
            @endif
        </div>
        <div class="left-side">
            <input class="form-control normalButton" type="submit" value="Send">
        </div>
        </form>
    </div>
</section>
@endsection