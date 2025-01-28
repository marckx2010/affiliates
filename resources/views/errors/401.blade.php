@extends('errors::minimal')

<style>
    html {
        height: 100%;
    }
    body {
        background-color: white;
        height: 100%;
    }

    .error-page {
        border-radius: 5px;
        border-color: #0c5460;
        background-color: white;
        padding: 30px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .links {
        color: blue;
        font-size: 24px;
    }
    li {
        list-style-type: none;
    }
</style>

@section('title', __('Server Error'))

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="error-page">
                    <img src="/images/screenshot_small.png" alt="screenshot">
                    <br/>
                    <div class="error-content">
                        <h1><i class="fa fa-warning text-yellow"></i> Sorry!</h1>
                        <h2>Due to limited resources the Affiliates sample application may only be used once a day.</h2>
                        <h2>Please try again tomorrow</h2>

                        <div class="links">
                            You may return to:
                        <ul>
                            <li>
                                <a href="https://marckx.tech">Marckx Tech Homepage</a>
                            </li>
                            <li>
                                <a href="https://marckx.tech/about/projects">Marckx Tech Projects Page</a>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>

