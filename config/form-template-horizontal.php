<?php
return [
	'inputContainer' => '{{content}}',
	'inputContainerError' => '<div class="form-group has-error">{{content}}</div>',
	'label' => '<label class="control-label" {{attrs}}>{{text}}</label>',
	'input' => '<input type="{{type}}" name="{{name}}" {{attrs}} />',
	'textarea' => '<textarea name="{{name}}" {{attrs}}>{{value}}</textarea>',
	'nestingLabel' => '<div class="checkbox">{{hidden}}<label{{attrs}}>{{input}}{{text}}</label></div>'
];
