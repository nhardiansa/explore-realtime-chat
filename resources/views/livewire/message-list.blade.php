<div id="chat-wrapper" class="chat-wrapper flex flex-col gap-y-4 mb-4">
    @foreach ($messages as $message)
    @if ($message['sender_id'] == auth()->id())
    <div class="chat-item-sender flex flex-row-reverse items-start gap-2.5">
        <img class="w-8 h-8 rounded-full object-cover" src="https://placehold.co/600x400" alt="Jese">
        <div
            class="flex flex-col w-full max-w-[70%] leading-1.5 p-4 border-gray-200 bg-gray-100 rounded-s-xl rounded-ee-xl dark:bg-gray-700">
            <div class="flex items-center space-x-2 rtl:space-x-reverse">
                <span class="text-sm font-semibold text-gray-900 dark:text-white">{{$message['sender']['name']}}</span>
                <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                    {{\Carbon\Carbon::parse($message['created_at'])->diffForHumans()}}
                </span>
            </div>
            <p class="text-sm font-normal py-2.5 text-gray-900 dark:text-white">
                {{$message['text_content']}}
            </p>
        </div>
    </div>
    @else
    <div class="chat-item-receiver flex items-start gap-2.5">
        <img class="w-8 h-8 rounded-full object-cover" src="https://placehold.co/600x400" alt="Jese">
        <div
            class="flex flex-col w-full max-w-[70%] leading-1.5 p-4 border-gray-200 bg-gray-100 rounded-e-xl rounded-es-xl dark:bg-gray-700">
            <div class="flex items-center space-x-2 rtl:space-x-reverse">
                <span class="text-sm font-semibold text-gray-900 dark:text-white">{{$message['sender']['name']}}</span>
                <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                    {{\Carbon\Carbon::parse($message['created_at'])->diffForHumans()}}
                </span>
            </div>
            <p class="text-sm font-normal py-2.5 text-gray-900 dark:text-white">
                {{$message['text_content']}}
            </p>
        </div>
    </div>
    @endif
    @endforeach
</div>

<script>
    window.addEventListener("load", (event) => {
        const wireId = document.querySelector('#chat-wrapper').getAttribute('wire:id');
        const messageListComponent = Livewire.find(wireId);
        const currentUserId = @json($currentUserId);

        // window.Echo.private(`chat.${currentUserId}`)
        //     .listen('MessageSent', (e) => {
        //         messageListComponent.call('getListMessages');
        //     });
        })
</script>
