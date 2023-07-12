<!DOCTYPE html>
<html lang="en">
   <head>
      <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
      <title>Add Playlist</title>
   </head>
   <body>
      <form action="/addplaylist" method="post" enctype="multipart/form-data">
         <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-whitefont-bold py-2 px-4 rounded">Back to select</button>
      </form>
      <form action="/addplaylistartist" method="post">
         <div class="space-y-12">
            <!--            adding to playlist artist-->
            <div class="border-b border-gray-900/10 pb-8">
               <h2 class="text-base font-semibold leading-7 text-gray-900">Create Playlist</h2>
               <div class="mt-3 grid grid-cols-1 gap-x-5 gap-y-5 sm:grid-cols-4">
               </div>
               <label for="playlist_for" class="block text-sm font-medium leading-6 text-gray-900">playlist for Artist</label>
               <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                  <?php foreach ($artist as $artistname): ?>
                  <input type="checkbox"  name="album[]" value="<?php echo $artistname->id?>"><?php echo $artistname->artist_name?>
                  <?php endforeach; ?>
               </div>
            </div>
         </div>
         <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-whitefont-bold py-2 px-4 rounded">add Music</button>
      </form>
   </body>
</html>