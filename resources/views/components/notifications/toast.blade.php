@if (session()->has('success_message'))
<div class="flex justify-between items-center px-2 py-3 rounded-md m-3 bg-green-300 text-green-700 w-full">
    <strong>{{ session()->get('success_message') ?? 'Article' }}</strong>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 cursor-pointer">
        <path fill-rule="evenodd"
            d="M5.47 5.47a.75.75 0 0 1 1.06 0L12 10.94l5.47-5.47a.75.75 0 1 1 1.06 1.06L13.06 12l5.47 5.47a.75.75 0 1 1-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 0 1-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 0 1 0-1.06Z"
            clip-rule="evenodd" />
    </svg>
</div>
@endif
@if (session()->has('warning_message'))
    <div class="flex justify-between items-center px-2 py-3 rounded-md m-3 bg-orange-300 text-orange-700 w-full">
        <strong>{{ session()->get('warning_message') }}</strong>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 cursor-pointer">
            <path fill-rule="evenodd"
                d="M5.47 5.47a.75.75 0 0 1 1.06 0L12 10.94l5.47-5.47a.75.75 0 1 1 1.06 1.06L13.06 12l5.47 5.47a.75.75 0 1 1-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 0 1-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 0 1 0-1.06Z"
                clip-rule="evenodd" />
        </svg>
    </div>
@endif
@if (session()->has('error_message'))
    <div class="flex justify-between items-center px-2 py-3 rounded-md m-3 bg-red-300 text-red-700 w-full">
        <strong>{{ session()->get('error_message') }}</strong>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 cursor-pointer">
            <path fill-rule="evenodd"
                d="M5.47 5.47a.75.75 0 0 1 1.06 0L12 10.94l5.47-5.47a.75.75 0 1 1 1.06 1.06L13.06 12l5.47 5.47a.75.75 0 1 1-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 0 1-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 0 1 0-1.06Z"
                clip-rule="evenodd" />
        </svg>
    </div>
@endif
