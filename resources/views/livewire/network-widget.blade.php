<div>
    <label
        for="toogleA"
        class="flex items-center cursor-pointer"
        x-data="{
                        main: {{$main ? 'true' : 'false'}},
                        changeNetwork : _ => {
                            const csrfToken = document.head.querySelector('[name~=csrf-token][content]').content;
                            fetch(`/network/change`,
                            {
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-Token': csrfToken
                                },
                                credentials: 'same-origin',
                                mode: 'no-cors'
                            })
                                  .then(res => res.json())
                                  .then(data => {
                                    window.location.reload();
                                  });
                        }
                    }"
    >
        <!-- toggle -->
        <div class="relative">
            <!-- input -->
            <input id="toogleA" type="checkbox" @change="changeNetwork()" class="hidden" x-bind:checked="main === true"/>
            <!-- line -->
            <div
                class="toggle__line w-10 h-4 bg-gray-400 rounded-full shadow-inner"
            ></div>
            <!-- dot -->
            <div
                class="toggle__dot absolute w-6 h-6 bg-white rounded-full shadow inset-y-0 left-0"
            ></div>
        </div>
        <!-- label -->
        <div
            class="ml-3 text-gray-700 font-medium"
        >
            {{ $network }}
        </div>
    </label>
</div>
