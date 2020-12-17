@extends('public.template')

@section('title')
<title>Add Customer</title>
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

    .spaned {
        background: #fefefe;
        color: gray;
        padding: 0 1.5%;
        border-radius: 3px;
        color: black;
        
    }
</style>
@endsection

@section('content')
<h1 class="uk-heading-line uk-text-lead"><span>Add customers</span></h1>
@if(isset($message))

<div class="{{ $message['type'] }}-box">
    <ul>
        <li>{{ $message['content'] }}</li>
    </ul>
</div>

@endif
<form class="uk-form-stacked uk-grid-small" method="POST" action="{{ route('Customers > Add') }}" uk-grid>
        @csrf
        <div class="uk-width-1-2@s">
            <label class="uk-form-label" for="form-stacked-text">Name</label>
            <div class="uk-form-controls">
                <input name="customer_name" class="uk-input" type="text" placeholder="Customer name">
            </div>
        </div>

        <div class="uk-width-1-2@s">
            <label class="uk-form-label" for="form-stacked-text">Company name</label>
            <div class="uk-form-controls">
                <input name="company_name" class="uk-input" type="text" placeholder="Company name">
            </div>
        </div>
        <!-- 
        <div class="uk-width-1-2@s">
            <label class="uk-form-label" for="form-stacked-text">Customer info</label>
            <div class="uk-form-controls">
                <textarea name="customer_info" id="customer_info" class="uk-textarea" cols="30" rows="7" style="font-family: monospace">{
"key":"value",
"prop":"value"
}</textarea>
                <span class="uk-text-small">Should follow <strong class="uk-text-danger">json</strong> formatting.</span>
            </div>
        </div>
        <div class="uk-width-1-2@s">
            <label class="uk-form-label" for="form-stacked-text">Json preview</label>
            <div class="uk-form-controls">
                <textarea id="json-preview" class="uk-textarea" cols="30" rows="7"></textarea>
            </div>
        </div>

        <div class="uk-width-1-1" uk-grid>
            <div class="uk-width-1-2@s">
                <div class="alert-box">
                    <ul>
                        <li>Add customer options here.</li>
                        <li>Each textbox should contains 1 option following by value</li>
                        <li>Options & values should seprate by <span class="spaned">:</span></li>
                    </ul>
                </div>
            </div>
            <div class="uk-width-1-2@s" id="options_wrapper">
                <div>
                    <label class="uk-form-label" for="form-stacked-text">Option name</label>
                    <div class="uk-form-controls">
                        <input name="options[]" class="uk-input" type="text" placeholder="Company name">
                    </div>
                </div>
                <div>
                    <label class="uk-form-label" for="form-stacked-text">Option name</label>
                    <div class="uk-form-controls">
                        <input name="options[]" class="uk-input" type="text" placeholder="Company name">
                    </div>
                </div>
            </div>
        </div>
         -->

        <div class="uk-width-1-1">
            <div class="uk-form-controls">
                <button class="uk-button uk-button-primary">Add customer</button>
            </div>
        </div>
</from>
<script>
function jsonfiy() {
    var obj = document.getElementById('customer_info').value
    var pretty = JSON.stringify(obj, undefined, 2);
    var ugly = document.getElementById('customer_info').value;
    document.getElementById('json-preview').value = pretty;
}
jsonfiy();
document.getElementById('customer_info').addEventListener('input', jsonfiy);

function addOption() {
    var node = document.createElement("div");                 // Create a <li> node
    var textnode = document.createTextNode("Water");         // Create a text node
    node.appendChild(textnode);                              // Append the text to <li>
    document.getElementById("options_wrapper").appendChild(node);     // Append <li> to <ul> with id="myList"
}
</script>
@endsection