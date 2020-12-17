@extends('public.template')

@section('title')
<title>Add Service</title>
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
</style>
@endsection

@section('content')
<h1 class="uk-heading-line uk-text-lead"><span>Add Service</span></h1>
@if(isset($message))

<div class="{{ $message['type'] }}-box">
    <ul>
        <li>{{ $message['content'] }}</li>
    </ul>
</div>

@endif
<form class="uk-form-stacked uk-grid-small" method="POST" action="{{ route('Services > Add') }}" uk-grid>
        @csrf
        <div class="uk-width-1-2@s">
            <label class="uk-form-label" for="form-stacked-text">Name</label>
            <div class="uk-form-controls">
                <input name="service_name" class="uk-input" type="text" placeholder="Service name">
            </div>
        </div>

        <div class="uk-width-1-2@s">
            <label class="uk-form-label" for="form-stacked-text">Author</label>
            <div class="uk-form-controls">
                <select class="uk-select" id="form-stacked-select" name="customer_id">
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                @endforeach
                </select>
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
                <span class="uk-text-small">Should follow <strong class="uk-text-danger"><a style="color: red; text-decoration: underline" href="https://www.php.net/manual/en/function.array.php">PHP ARRAY</a> </strong> formatting.</span>
            </div>
        </div>
        <div class="uk-width-1-2@s">
            <label class="uk-form-label" for="form-stacked-text">Json preview</label>
            <div class="uk-form-controls">
                <textarea id="json-preview" class="uk-textarea" cols="30" rows="7"></textarea>
            </div>
        </div>
        -->
        <div class="uk-width-1-1" uk-grid>
            <div class="uk-width-1-2@s">
                <div class="warning-box">
                    <ul>
                        <li>Add customer options here.</li>
                        <li>Each line should contains one option followed by value.</li>
                        <li>Options & values should seprate by <span class="spaned">:</span> from the value.</li>
                        <li>Lines should ends with <span class="spaned">,</span>.</li>
                        <li>There is no need to add <span class="spaned">,</span> for last line.</li>
                    </ul>
                </div>
            </div>

            <div class="uk-width-1-2@s">
                <label class="uk-form-label" for="form-stacked-text">Options & values</label>
                <div class="uk-form-controls">
                    <textarea id="options" name="options" class="uk-textarea" cols="30" rows="7"></textarea>
                </div>
            </div>

            <div class="uk-width-1-1">
                <div class="uk-form-controls">
                    <button class="uk-button uk-button-primary">Add service</button>
                </div>
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