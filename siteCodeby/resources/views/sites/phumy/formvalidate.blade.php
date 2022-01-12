<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form data-form>
    <div data-field-holder>
        <input name="firstfield" />
        <span data-field-error></span>
    </div>
    <div data-field-holder>
        <input name="cpf" />
        <span data-field-error></span>
    </div>
    <div data-field-holder>
        <input name="test" />
        <span data-field-error></span>
    </div>
    <button>aa</button>
</form>


<script src="{{ asset('js/vanillajs-validation.min.js') }}"></script>
<script type="text/javascript">
    var form = document.querySelector('[data-form]');
    var v = new vanillaValidation(form, {
        customRules: {
            valueIs: function (inputValue, ruleValue) {
                return inputValue === ruleValue;
            },
        },
        rules: {
            firstfield: {
                minlength: 2,
                required: true
            },
            cpf: {
                cpf: true,
                required: true
            },
            test: {
                valueIs: 'customRuleTest'
            }
        },
        messages: {
            firstfield: {
                minlength: 'This input should have at least 2 characters.',
                required: 'Input value required!'
            },
            test: {
                valueIs: 'The field value must be "customRuleTest".'
            }
        }
    });
</script>
</body>
</html>