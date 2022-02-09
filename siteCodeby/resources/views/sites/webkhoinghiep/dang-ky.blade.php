@extends($config->layout.'/auth')
@section('main')
    <main class="min-h-full flex">
        <section class="flex-1 flex flex-col justify-center py-12 px-4 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
            <div class="mx-auto w-full max-w-sm lg:w-96">
                <div>
                    <img class="h-12 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg"
                         alt="Workflow">
                    <h2 class="mt-6 text-3xl font-extrabold text-gray-900">
                        Đăng ký
                    </h2>
                    <p class="mt-2 text-sm text-gray-600">
                        đã có tài khoản
                        <a href="{{$config->base_url}}/dang-nhap"
                           class="font-medium text-indigo-600 hover:text-indigo-500">
                            đăng nhập
                        </a>
                    </p>
                </div>

                <div class="mt-8">
                    <div class="mt-6" x-data>
                        @php
                            $fields = [
                                [
                                    'label' => "Họ và tên",
                                    'name' => "hoten",
                                ],
                                [
                                    'label' => "Số điện thoại",
                                    'name' => "sdt",
                                    'type' => "tel",
                                ],
                                [
                                    'label' => "Email",
                                    'name' => "_username",
                                    'type' => "email",
                                ],
                                [
                                    'label' => "Mật khẩu",
                                    'name' => "_password",
                                    'type' => "password",
                                ],
                                [
                                    'label' => "Xác nhận mật khẩu",
                                    'name' => "_password_confirm",
                                    'type' => "password",
                                ],
                            ];
                        @endphp
                        <form action="#" method="POST" class="space-y-9">
                            @foreach($fields as $key => $item)
                                <div class="relative">
                                    <label for="{{$item['name']}}"
                                           class="block text-sm font-medium text-gray-700">
                                        {{$item['label']}}
                                    </label>
                                    <div class="mt-1">
                                        <input id="{{$item['name']}}" name="{{$item['name']}}"
                                               autocomplete="off"
                                               type="{{$item['type']??'text'}}"
                                               :class="$store.formErrors.{{$item['name']}}[0] ? '!border-red-500':' '"
                                               class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <p class="text-red-500 absolute bottom-0 -mb-6 text-sm"
                                           x-text="$store.formErrors.{{$item['name']}}[0]"></p>
                                    </div>
                                </div>
                            @endforeach
                            <div>
                                <button type="submit"
                                        :class="$store.formSubmit ? 'cursor-not-allowed opacity-50':''"
                                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition ease-in-out duration-150">
                                    <svg x-show="$store.formSubmit"
                                         class="animate-spin -ml-1 mr-2 h-5 w-5 text-white"
                                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                                stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor"
                                              d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                    Đăng ký
                                </button>
                            </div>
                        </form>
                        <script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.13.1/validate.min.js"></script>
                        <script>
                            document.addEventListener('alpine:init', () => {
                                Alpine.store('formErrors', {});
                                Alpine.store('formSubmit', false);
                            });
                            const form = document.querySelector('form');

                            function handleChange(event) {
                                Alpine.store('formErrors', {});
                                // Alpine.store('formSubmit', true);
                                event.preventDefault();
                                const constraints = {
                                    hoten: {
                                        presence: {allowEmpty: false, message: "^Họ và tên không được để trống"},
                                    },
                                    sdt: {
                                        presence: {allowEmpty: false, message: "^Số điện thoại không được để trống"},
                                        format: {
                                            pattern: /^[\+\- 0-9\(\)]{9,}$/im,
                                            message: "^Số điện thoại không hợp lệ"
                                        },
                                    },
                                    _username: {
                                        presence: {allowEmpty: false, message: "^Email không được để trống"},
                                        email: {message: "^Email không hợp lệ"}
                                    },
                                    _password: {
                                        presence: {allowEmpty: false, message: "^Mật khẩu không được để trống"},
                                    },
                                    _password_confirm: {
                                        equality: {
                                            attribute: "_password",
                                            message: "^Xác nhận mật khẩu phải trùng nhau",
                                        }
                                    },
                                };
                                const formValues = {
                                    hoten: form.elements.hoten.value,
                                    sdt: form.elements.sdt.value,
                                    _username: form.elements._username.value,
                                    _password: form.elements._password.value,
                                    _password_confirm: form.elements._password_confirm.value,
                                };
                                const errors = validate(formValues, constraints);
                                if (errors) {
                                    event.preventDefault();
                                    Alpine.store('formErrors', errors);
                                    Alpine.store('formSubmit', false);
                                } else {
                                    // Alpine.store('formSubmit', true);
                                    //     setTimeout(() => {
                                    //         Alpine.store('formSubmit', 'done');
                                    //     }, 1000)
                                }
                            }

                            async function handleSubmit() {
                                const formErrors = Alpine.store('formErrors');
                                if (Object.keys(formErrors).length) return;
                                const payload = Form.getPayload(form)
                                console.log('payload', payload);
                                const res = await Http.post('/tai-khoan/auth-register', payload)
                                console.log('res', res);


                                // const payload = new FormData(form);
                                //
                                // function serialize(data) {
                                //     let obj = {};
                                //     for (let [key, value] of data) {
                                //         if (obj[key] !== undefined) {
                                //             if (!Array.isArray(obj[key])) {
                                //                 obj[key] = [obj[key]];
                                //             }
                                //             obj[key].push(value);
                                //         } else {
                                //             obj[key] = value;
                                //         }
                                //     }
                                //     return obj;
                                // }

                                // console.log('payload', payload, serialize(payload));

                                // console.log('formSubmit', formSubmit);
                                // Alpine.store('formErrors'
                            }

                            form.addEventListener('submit', (e) => {
                                handleChange(e);
                                handleSubmit();
                                // setTimeout(()=>handleSubmit(), 100)
                            }, false);
                            form.addEventListener('change', handleChange, false);
                            var inputs = form.querySelectorAll('input')
                            for (i = 0; i < inputs.length; i++) {
                                inputs[i].addEventListener('keyup', handleChange, false);
                            }
                        </script>
                    </div>
                </div>
            </div>
        </section>
        <div class="hidden lg:block relative w-0 flex-1">
            <img class="absolute inset-0 h-full w-full object-cover"
                 src="https://images.unsplash.com/photo-1505904267569-f02eaeb45a4c?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1908&q=80"
                 alt="">
        </div>
    </main>
@endsection
