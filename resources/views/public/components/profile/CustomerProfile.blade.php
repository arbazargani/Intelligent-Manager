@extends('public.template')

@section('title')
<title>Customer - {{ $customer->name }}</title>
<style>
    .alert-box {
        background: #f4645f;
        color: #fff;
        border-radius: 3px;
        margin: 10px 0 20px;
        padding: 10px;
    }

    .info-box {
        background: #3498db;
        color: #fff;
        border-radius: 3px;
        margin: 10px 0 20px;
        padding: 10px;
    }

    .warning-box {
        background: #e67e22;
        color: #fff;
        border-radius: 3px;
        margin: 10px 0 20px;
        padding: 10px;
    }

    .spaned {
        background: #fefefe;
        color: gray;
        padding: 0 1.5%;
        border-radius: 3px;
        color: black;
        
    }

    .blue-box {
        background: #5d34db;
        color: #fff;
        border-radius: 3px;
        margin: 10px 0 20px;
        padding: 10px;
    }
</style>
@endsection

@section('content')
<div id="customers-data-wrapper" class="uk-overflow-auto">
<h1 class="uk-heading-line uk-text-lead"><span>Customer info</span></h1>
    <article class="uk-comment">
        <header class="uk-comment-header">
            <div class="uk-grid-medium uk-flex-middle" uk-grid>
                <div class="uk-width-auto">
                    <img class="uk-comment-avatar" src="{{ asset('/assets/images/lumen.png') }}" width="80" height="80" alt="">
                </div>
                <div class="uk-width-expand">
                    <h4 class="uk-comment-title uk-margin-remove"><a class="uk-link-reset" href="#">{{ $customer->name }}</a></h4>
                    <ul class="uk-comment-meta uk-subnav uk-subnav-divider uk-margin-remove-top">
                        <li>Registered {{ Carbon\Carbon::parse($customer->created_at)->diffForHumans() }}</li>
                        <li><a href="#">Edit <span uk-icon="icon: cog"></span></a></li>
                    </ul>
                </div>
            </div>
        </header>
        <div class="uk-comment-body">
            <div class="uk-card uk-card-default">
                <div class="uk-card-media-top uk-text-center">
                    <img class="uk-border-rounded" src="{{ asset('/assets/images/server.jpg') }}" alt="">
                </div>
                <div class="uk-card-body">
                    <h1 class="uk-heading-line uk-text-lead"><span><span uk-icon="icon: database"></span> Customer services</span></h1>
                    
                    <ul uk-accordion="collapsible: false">
                        @foreach($customer->services as $service)
                        <li>
                            <a class="uk-accordion-title" href="#">{{ $service->name }}</a>
                            <div class="uk-accordion-content">
                                <div class="uk-width-1-1 blue-box">
                                    <p>
                                        <ul>
                                        @foreach(explode(',', $service->info) as $item)
                                                <li>
                                                    <span>{{ explode(':', $item)[0] }}: <span class="uk-label uk-label-success">{{ explode(':', $item)[1] }}</span></span>
                                                </li>
                                        @endforeach
                                        </ul>
                                    </p>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    

                </div>
            </div>
        </div>
    </article>
</div>
@endsection