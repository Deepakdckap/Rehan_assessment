<!DOCTYPE html>
<html lang="en">
   <head>
      <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
      <title>AddArtist</title>
   </head>
   <body>
      <form action="/addartist" method="post" enctype="multipart/form-data">
         <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-8">
               <h2 class="text-base font-semibold leading-7 text-gray-900">Add artist</h2>
               <div class="mt-3 grid grid-cols-1 gap-x-5 gap-y-5 sm:grid-cols-4">
                  <div class="sm:col-span-4">
                     <label for="artistName" class="block text-sm font-medium leading-6 text-gray-900">Artist
                     Name</label>
                     <div class="mt-2">
                        <div
                           class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                           <input type="text" name="artistName" id="artistName" autocomplete="username"
                              class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                              placeholder="Anirudh">
                        </div>
                     </div>
                  </div>
                  <div class="col-span">
                     <label for="song-photo" class="block text-sm font-medium leading-6 text-gray-900">artist photo
                     photo</label>
                     <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                        <div class="text-center">
                           <div class="mt-4 flex text-sm leading-6 text-gray-600">
                              <label for="file-upload"
                                 class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                              <span>Upload a file</span>
                              <input type="file" id="file-upload" name ="artist[]"  multiple ="multiple">
                              </label>
                           </div>
                           <p class="text-xs leading-5 text-gray-600">only JPG</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-whitefont-bold py-2 px-4 rounded">
            add Artist</button>
         </div>
      </form>
   </body>
</html>