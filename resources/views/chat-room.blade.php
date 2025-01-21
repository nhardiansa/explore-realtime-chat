<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div id="chat-list" class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @livewire('message-list', ['user' => $user])

                    {{-- Text Field Message --}}
                    @livewire('send-message', ['user' => $user])

                </div>
            </div>
        </div>
    </div>


    @section('custom-script')
    {{-- <script>
        const target = {{Js::from($user)}}
        const currentUserId = {{Js::from(auth()->id())}}
        const textInputMessage = document.querySelector('textarea#chat');
        const formMessage = document.querySelector('form');
        const chatMessageWrapper = document.querySelector('.chat-wrapper')
        let messages = [];

        formMessage.addEventListener('submit', (e) => {
            e.preventDefault();
            if(textInputMessage.value) {
                const message = textInputMessage.value;
                sendMessage()
            }
        })

        const sendMessage = () => {
            const message = textInputMessage.value;
            textInputMessage.value = '';
            axios.post('/messages', {
                'text_content': message,
                'receiver_id': target.id
            })
            .then((response) => {
                console.log(response);
            })
            .catch((error) => {
                console.log(error);
            });
        }

        const getMessages = () => {
            axios.get(`/messages/${target.id}`)
                .then( response => {
                    const result = response.data.messages
                    messages = [...result]
                    console.log(messages);
                    // messages.forEach((message) => {
                    //     const date = new Date(message.created_at)

                    //     const dateOptions = {
                    //         year: 'numeric',
                    //         month: 'long',
                    //         day: 'numeric'
                    //     };
                    //     const humanReadableDate = date.toLocaleDateString('id-ID', dateOptions);

                    //     const timeOptions = {
                    //         hour: '2-digit',
                    //         minute: '2-digit',
                    //     };
                    //     const humanReadableTime = date.toLocaleTimeString('id-ID', timeOptions);

                    //     const messageItem = message.sender_id === currentUserId ? (
                    //         senderMessageItem(message.sender.name, message.text_content, `${humanReadableDate} ${humanReadableTime}`)
                    //     ) : (
                    //     receiverMessageItem(message.sender.name, message.text_content, `${humanReadableDate} ${humanReadableTime}`))
                    //     chatMessageWrapper.innerHTML += messageItem
                    // })

                })
                .catch( error => {
                    console.error('Error getting messages',error);
                })
        }

        // window.on
        window.addEventListener("load", (event) => {
            getMessages()
            activateEcho()
        });


        const senderMessageItem = (name, textContent, deliveredTime) => (`
            <div class="chat-item-sender flex flex-row-reverse items-start gap-2.5">
                <img class="w-8 h-8 rounded-full object-cover" src="https://placehold.co/600x400"
                    alt="Jese">
                <div
                    class="flex flex-col w-full max-w-[70%] leading-1.5 p-4 border-gray-200 bg-gray-100 rounded-s-xl rounded-ee-xl dark:bg-gray-700">
                    <div class="flex items-center space-x-2 rtl:space-x-reverse">
                        <span class="text-sm font-semibold text-gray-900 dark:text-white">${name}</span>
                        <span class="text-sm font-normal text-gray-500 dark:text-gray-400">${deliveredTime}</span>
                    </div>
                    <p class="text-sm font-normal py-2.5 text-gray-900 dark:text-white">
                        ${textContent}
                    </p>
                </div>
            </div>
        `)

        const receiverMessageItem = (name, textContent, deliveredTime) => (`
            <div class="chat-item-receiver flex items-start gap-2.5">
                <img class="w-8 h-8 rounded-full object-cover" src="https://placehold.co/600x400"
                    alt="Jese">
                <div
                    class="flex flex-col w-full max-w-[70%] leading-1.5 p-4 border-gray-200 bg-gray-100 rounded-e-xl rounded-es-xl dark:bg-gray-700">
                    <div class="flex items-center space-x-2 rtl:space-x-reverse">
                        <span class="text-sm font-semibold text-gray-900 dark:text-white">${name}</span>
                        <span class="text-sm font-normal text-gray-500 dark:text-gray-400">${deliveredTime}</span>
                    </div>
                    <p class="text-sm font-normal py-2.5 text-gray-900 dark:text-white">
                        ${textContent}
                    </p>
                </div>
            </div>
        `)

        const activateEcho = () => {
            // console.log(Echo)
            Echo.private(`chat.${currentUserId}`)
                .listen("MessageSent", (response) => {
                    console.log('Message Sent',response.message);
                    getMessages()
                })
        }

        function setup() {
            return {
                messages
            }
        }

    </script> --}}
    <script>
        // window.addEventListener("load", (event) => {

        //     window.Echo.private(`chat.15`)
        //         .listen('MessageSent', (e) => {
        //             console.log(e);
        //         });
        // })
    </script>
    @endsection
</x-app-layout>
