@extends('public.template')

@section('title')
<title>Customer - {{ $customer->name }}</title>
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
                        <li><a>{{ Carbon\Carbon::parse($customer->created_at)->diffForHumans() }}</a></li>
                        <li><a href="#">Edit <span uk-icon="icon: cog"></span></a></li>
                    </ul>
                </div>
            </div>
        </header>
        <div class="uk-comment-body">
            <div class="uk-card uk-card-default">
                <!-- <div class="uk-card-media-top uk-text-center">
                    <img class="uk-border-rounded" src="{{ asset('/assets/images/server.jpg') }}" alt="">
                </div> -->
                <div class="uk-card-body">
                    <h3 class="uk-heading-line uk-text-small"><span><span uk-icon="icon: database"></span> Customer services</span></h3>
                    <div class="uk-container">
                        <ul uk-accordion="collapsible: false">
                            @foreach($customer->services as $service)
                            <li>
                                <a class="uk-accordion-title uk-text-meta" href="#">{{ $service->name }}</a>
                                <div class="uk-accordion-content">
                                    <div class="uk-width-1-1">
                                        <ul class="uk-list uk-list-hyphen uk-list-primary">
                                            @foreach(explode(',', $service->info) as $item)
                                            <li>
                                                @if(strpos($service->info, ':') !== false)
                                                    <p><span>{{ explode(':', $item)[0] }}: <span class="uk-label uk-label-success">{{ explode(':', $item)[1] }}</span></span></p>
                                                @else
                                                    <p><span class="uk-label uk-label-danger">Syntax incorrect.</span></p>
                                                @endif
                                            </li>
                                            @endforeach
                                        </ul>
                                        <hr class="uk-divider-icon">
                                        <div class="uk-container uk-padding uk-background-muted uk-border-rounded">
                                            <p class="uk-text-center">
                                                <a class="uk-link uk-link-reset uk-margin-small-right" href="{{ route('Service > Update', $service->hash) }}"><span class="uk-label uk-label-warning">Edit</span></a>
                                                <a class="uk-link uk-link-reset uk-margin-small-left" href="#delete-service-{{ $service->hash }}" uk-toggle>Delete</a>
                                                <!-- href="{{ route('Service > Delete', $service->hash) }}" -->
                                            </p>
                                        </div>
                                        <div id="delete-service-{{ $service->hash }}" uk-modal>
                                            <div class="uk-modal-dialog">
                                                <button class="uk-modal-close-default" type="button" uk-close></button>
                                                <div class="uk-modal-header">
                                                    <h2 class="uk-modal-title">Confirm action</h2>
                                                </div>
                                                <div class="uk-modal-body">
                                                    <p>Are you sure you want to delete service <span class="spaned">{{ $service->name }}</span>?</p>
                                                </div>
                                                <div class="uk-modal-footer uk-text-right">
                                                    <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                                                    <button class="uk-button uk-button-danger" type="button" onClick="document.getElementById('confirm-delete-service-{{ $service->hash }}').submit();">Delete</button>
                                                    <form id="confirm-delete-service-{{ $service->hash }}" method="POST" action="{{ route('Service > Delete', $service->hash) }}">
                                                        @csrf
                                                        <input type="hidden" name="hash" value="{{ $service->hash }}">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </article>
</div>
@endsection