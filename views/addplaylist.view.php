<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Add Playlist</title>
      <style>
         body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            color: #374151;
         }

         .bg-blue-500 {
            background-color: #3b82f6;
         }

         .hover\:bg-blue-700:hover {
            background-color: #2563eb;
         }

         .text-white {
            color: #ffffff;
         }

         .font-bold {
            font-weight: bold;
         }

         .py-2 {
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
         }

         .px-4 {
            padding-left: 1rem;
            padding-right: 1rem;
         }

         .rounded {
            border-radius: 0.375rem;
         }

         .block {
            display: block;
         }

         .text-sm {
            font-size: 0.875rem;
         }

         .leading-6 {
            line-height: 1.5rem;
         }

         .text-gray-900 {
            color: #374151;
         }

         .flex {
            display: flex;
         }addplaylist

         .ring-1 {
            border-width: 1px;
         }

         .ring-inset {
            box-shadow: inset 0 0 0 calc(0.125rem - 1px) currentColor;
         }

         .ring-gray-300 {
            --ring-opacity: 1;
            border-color: rgba(209, 213, 219, var(--ring-opacity));
         }

         .focus\:ring-2:focus {
            outline: 0;
            box-shadow: var(--ring-offset-shadow, 0 0 #0000),
               var(--ring-shadow, 0 0 0 3px rgba(66, 153, 225, 0.5));
         }

         .focus\:ring-inset:focus {
            outline: 0;
            box-shadow: var(--ring-inset-shadow, 0 0 #0000),
               var(--ring-inset-shadow, 0 0 0 1px rgba(66, 153, 225, 0.5));
         }

         .focus\:ring-indigo-600:focus {
            --ring-color: #2563eb;
            --ring-opacity: 1;
            border-color: rgba(37, 99, 235, var(--ring-opacity));
         }

         .sm\:max-w-md {
            max-width: 24rem;
         }

         .mt-3 {
            margin-top: 0.75rem;
         }

         .grid {
            display: grid;
         }

         .grid-cols-1 {
            grid-template-columns: repeat(1, minmax(0, 1fr));
         }
      </style>
   </head>
   <body>
      <form action="/" method="post" enctype="multipart/form-data">
         <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Back</button>
      </form>
      <form action="/addplaylist" method="post">
         <div class="space-y-12">
         <!--            adding to playlist artist-->
         <div class="border-b border-gray-900 pb-8">
            <h2 class="text-base font-semibold leading-6 text-gray-900">Create Playlist</h2>
            <div class="mt-3 grid grid-cols-1 gap-5">
            </div>
            <label for="playlist_for" class="block text-sm font-medium leading-6 text-gray-900">Playlist For:</label>
            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
               <select name="playlist_for">
                  <option value="" hidden>Select</option>
                  <option value="Album">Album</option>
                  <option value="Artist">Artist</option>
               </select>
            </div>
         </div>
         <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Playlist</button>
      </form>
   </body>
</html>
