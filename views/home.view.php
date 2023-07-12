<!DOCTYPE html>
<html lang="en">
   <head>
      <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
      <title>Music</title>
   </head>
   <body>
      <div class="min-h-full">
      <nav class="bg-gray-800">
         <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
               <div class="flex items-center">
                  <div class="flex-shrink-0">
                     <img class="h-8 w-8" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500"
                        alt="Your Company">
                  </div>
                  <div class="hidden md:block">
                     <div class="ml-10 flex items-baseline space-x-4">
                        <!--                                homepage -->
                        <a href="/"
                           class="<?= $_SERVER['REQUEST_URI']=== '/' ?'bg-gray-900 text-white':'text-gray-300'?> rounded-md px-3 py-2 text-sm font-medium"
                           aria-current="page">HomePage</a>
                        <!--                                /** add  music */-->
                        <?php if (isset($_SESSION['admin'])) :?>
                        <form action="/addmusic" method="post" enctype="multipart/form-data">
                           <button type="submit"
                              class="<?= $_SERVER['REQUEST_URI']==='/addmusic' ?'bg-gray-900 text-white':'text-gray-300'?> hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Add Music</button>
                        </form>
                        <!--  /** add  artist */-->
                        <form action="/addartist" method="post" enctype="multipart/form-data">
                           <button type="submit"
                              class="<?= $_SERVER['REQUEST_URI']==='/addartist '?'bg-gray-900 text-white':'text-gray-300'?> hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Add artist</button>
                        </form>
                        <form action="/checkrequest" method="post" enctype="multipart/form-data">
                           <button type="submit"
                              class="<?=$_SERVER['REQUEST_URI']==='/checkrequest' ?'bg-gray-900 text-white':'text-gray-300'?> hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Request list</button>
                        </form>
                        <?php endif; ?>
                        <?php if (isset($_SESSION['user'])) :?>
                        <form action="/addplaylist" method="post">
                           <button type="submit"
                              class="<?=$_SERVER['REQUEST_URI']==='/addplaylist'?'bg-gray-900 text-white':'text-gray-300'?> hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Create Playlist</button>
                           <?php endif;?>
                        </form>
                        <?php if(isset($_SESSION['id'])) :?>
                        <form action="/requestpremium" method="post">
                           <input type="hidden" name="request_user_id" value="<?php echo ($_SESSION['id'])?>">
                           <button type="submit" class="<?=$_SERVER['REQUEST_URI']==='/requestpremium' ?'bg-gray-900 text-white':'text-gray-300'?> hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">A Premium</button>
                        </form>
                        <?php endif;?>
                     </div>
                  </div>
               </div>
               <div class="hidden md:block">
                  <div class="ml-4 flex items-center md:ml-6">
                     <!-- Admin Log in -->
                     <?php if (isset($_SESSION['admin'])) :?>
                     <form action="/logout" method="post" enctype="multipart/form-data">
                        <button type="submit"
                           class="bg-blue-500 hover:bg-blue-700 text-whitefont-bold py-2 px-4 rounded">
                        Log out</button>
                     </form>
                     <?php elseif(isset($_SESSION['user'])):?>
                     <form action="/logout" method="post" enctype="multipart/form-data">
                        <button type="submit"
                           class="bg-blue-500 hover:bg-blue-700 text-whitefont-bold py-2 px-4 rounded">
                        Log out</button>
                     </form>
                     <?php else : ?>
                     <div class="relative ml-3">
                        <div>
                           <form action="/login" method="post" enctype="multipart/form-data">
                              <button type="submit"class="bg-blue-500 hover:bg-blue-700 text-whitefont-bold py-2 px-4 rounded">Log in</button>
                           </form>
                        </div>
                     </div>
                     <?php endif; ?>
                  </div>
               </div>
            </div>
            <!--This section only admin can view in UI-->
      </nav>
      <main>
      <header class="bg-white shadow">
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold tracking-tight text-gray-900">
      </h1>
      </div>
      <div>
      <form action="/musiclist" method="post">
      <button class="<?= $_SERVER['REQUEST_URI']==='/musiclist' ?'bg-blue-500 text-white':'bg-gray-900 text-white '?> rounded-md px-3 py-2 text-sm font-medium"
         aria-current="page">All Music</button>
      </form>
      <form action="/artistlist" method="post" >
      <button class="<?= $_SERVER['REQUEST_URI']==='/artistlist' ?'bg-blue-500 text-white':'bg-gray-900 text-white '?> rounded-md px-3 py-2 text-sm font-medium"
         aria-current="page">All Artist</button>
      </form>
      </form>
      </div>
      </header>
      <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
      <?php if (isset($_SESSION['admin'])) :?>
      <p>Hello User,  <?php echo $_SESSION['admin']?></p>
      <?php endif; ?>
      <br>
      <?php if (isset($_SESSION['user'])) :?>
      <p>Hello Admin,   <?php echo $_SESSION['user']?> !!!</p>
      <?php endif; ?>
      <br>
      <?php foreach ($album as $albumname): ?>
      <form action="/albumdescription" method="post">
      <button name="projectId" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800" type ="submit" value="<?php echo $albumname->id?>"><?php echo $albumname->album_name?></button>
      </form>
      <?php endforeach; ?>
      <?php foreach ($artist as $artistname): ?>
      <form action="/artistdescription" method="post">
      <button name="projectId" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800" type ="submit" value="<?php echo $artistname->id?>"><?php echo $artistname->artist_name?></button>
      </form>
      <?php endforeach; ?>
      <?php if($checkrequest): ?>
      <form action="/approve" method="post" >
      <p><?php echo $checkrequest->username ?> <span>
      <?php if ( $checkrequest->is_premium ==0) :?>
      <?php echo "not approved"?>
      <button class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium" type="submit" name="user_id" value="<?php echo $checkrequest->id?>">Approve</button>
      <?php else : ?><?php echo "approved"?>
      <?php endif;?>
      </span>
      </form>
      <?php endif;?>
      </p>
      </div>
      </main>
      </div>
   </body>
</html>