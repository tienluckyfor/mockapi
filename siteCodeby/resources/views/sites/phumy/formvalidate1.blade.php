

<!DOCTYPE html>
<html lang="en" >

<head>

    <meta charset="UTF-8">

    <link rel="apple-touch-icon" type="image/png" href="https://cpwebassets.codepen.io/assets/favicon/apple-touch-icon-5ae1a0698dcc2402e9712f7d01ed509a57814f994c660df9f7a952f3060705ee.png" />
    <meta name="apple-mobile-web-app-title" content="CodePen">

    <link rel="shortcut icon" type="image/x-icon" href="https://cpwebassets.codepen.io/assets/favicon/favicon-aec34940fbc1a6e787974dcd360f2c6b63348d4b1f4e06c77743096d55480f33.ico" />

    <link rel="mask-icon" type="image/x-icon" href="https://cpwebassets.codepen.io/assets/favicon/logo-pin-8f3771b1072e3c38bd662872f6b673a722f4b3ca2421637d5596661b4e2132cc.svg" color="#111" />


    <title>CodePen - Form validation with Alpine.JS and Iodine</title>


    <link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Inter:wght@500&amp;display=swap'>

    <style>
        * {
            font-family: "Inter", sans-serif;
        }
        form {
            width: 40%;
            min-width: 450px;
            margin: auto;
        }
        label {
            font-size: 1.5em;
        }

        input {
            width: 100%;
            display: block;
            font-size: 2em;
            border: solid 4px;
            border-color: hsl(210, 100%, 30%);
            margin-bottom: 1.5em;
        }
        input[type="submit"] {
            width: fit-content;
            font-size: 1.5em;
        }

        input[type="submit"]:focus {
            background-color: hsl(210, 100%, 80%);
        }
        input[type="submit"]:active {
            background-color: hsl(200, 100%, 80%);
        }
        .invalid {
            border-color: darkred;
            background-color: hsl(0, 30%, 95%);
            margin-bottom: 0em;
        }
        .error-message {
            margin-bottom: 1em;
            color: hsl(0deg, 100%, 15%);
        }
    </style>

    <script>
        window.console = window.console || function(t) {};
    </script>



    <script>
        if (document.location.search.match(/type=embed/gi)) {
            window.parent.postMessage("resize", "*");
        }
    </script>

    <script src="//unpkg.com/alpinejs" defer></script>

</head>

<body translate="no" >
<form action="" x-data="form" @focusout="change" @input="change" @submit="submit">
    <h1>Register</h1>

    <label for="username">Username</label>
    <input name="username" id="username" type="text" x-bind:class="{'invalid':username.errorMessage}" data-rules='["required"]' data-server-errors='[]'>
    <p class="error-message" x-show="username.errorMessage" x-text="username.errorMessage" x-transition:enter></p>

    <label for="email">Email</label>
    <input name="email" type="email" id="email" x-bind:class="{'invalid':email.errorMessage}" data-rules='["required","email"]' data-server-errors='[]'>
    <p class="error-message" x-show="email.errorMessage" x-text="email.errorMessage" x-transition:enter></p>

    <label for="password">Password</label>
    <input name="password" type="password" id="password" x-bind:class="{'invalid':password.errorMessage}" data-rules='["required","minimum:8"]' data-server-errors='[]'>
    <p class="error-message" x-show="password.errorMessage" x-text="password.errorMessage" x-transition:enter></p>

    <label for="passwordConf">Confirm Password</label>
    <input name="passwordConf" type="password" id="passwordConf" x-bind:class="{'invalid':passwordConf.errorMessage}" data-rules='["required","minimum:8","matchingPassword"]' data-server-errors='[]'>
    <p class="error-message" x-show="passwordConf.errorMessage" x-text="passwordConf.errorMessage" x-transition:enter></p>

    <input type="submit">
</form>

<script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-1b93190375e9ccc259df3a57c1abc0e64599724ae30d7ea4c6877eb615f89387.js"></script>
<script src="https://cdn.jsdelivr.net/gh/mattkingshott/iodine/dist/iodine.min.umd.js" defer></script>


<script id="rendered-js" type="module">
    // import Alpine from "https://cdn.skypack.dev/alpinejs";
    // import kingshottIodine from "https://cdn.skypack.dev/@kingshott/iodine";

    Alpine.data("form", form);
    Alpine.start();

    function form() {
        return {
            inputElements: [],
            init() {
                //Set up custom Iodine rules
                Iodine.addRule(
                    "matchingPassword",
                    value => value === document.getElementById("password").value);

                Iodine.messages.matchingPassword =
                    "Password confirmation needs to match password";
                //Store an array of all the input elements with 'data-rules' attributes
                this.inputElements = [...this.$el.querySelectorAll("input[data-rules]")];
                this.initDomData();
                this.updateErrorMessages();
            },
            initDomData: function () {
                //Create an object attached to the component state for each input element to store its state
                this.inputElements.map(ele => {
                    this[ele.name] = {
                        serverErrors: JSON.parse(ele.dataset.serverErrors),
                        blurred: false };

                });
            },
            updateErrorMessages: function () {
                //map throught the input elements and set the 'errorMessage'
                this.inputElements.map(ele => {
                    this[ele.name].errorMessage = this.getErrorMessage(ele);
                });
            },
            getErrorMessage: function (ele) {
                //Return any server errors if they're present
                if (this[ele.name].serverErrors.length > 0) {
                    return input.serverErrors[0];
                }
                //Check using iodine and return the error message only if the element has not been blurred
                const error = Iodine.is(ele.value, JSON.parse(ele.dataset.rules));
                if (error !== true && this[ele.name].blurred) {
                    return Iodine.getErrorMessage(error);
                }
                //return empty string if there are no errors
                return "";
            },
            submit: function (event) {
                const invalidElements = this.inputElements.filter(input => {
                    return Iodine.is(input.value, JSON.parse(input.dataset.rules)) !== true;
                });
                if (invalidElements.length > 0) {
                    event.preventDefault();
                    document.getElementById(invalidElements[0].id).scrollIntoView();
                    //We set all the inputs as blurred if the form has been submitted
                    this.inputElements.map(input => {
                        this[input.name].blurred = true;
                    });
                    //And update the error messages.
                    this.updateErrorMessages();
                }
            },
            change: function (event) {
                //Ignore all events that aren't coming from the inputs we're watching
                if (!this[event.target.name]) {
                    return false;
                }
                if (event.type === "input") {
                    this[event.target.name].serverErrors = [];
                }
                if (event.type === "focusout") {
                    this[event.target.name].blurred = true;
                }
                //Whether blurred or on input, we update the error messages
                this.updateErrorMessages();
            } };

    }
    //# sourceURL=pen.js
</script>



</body>

</html>
 
