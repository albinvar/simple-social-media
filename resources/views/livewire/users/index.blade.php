<div>
<div class="flex flex-col p-4">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8 ">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg rounded-xl shadow-sm">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Name
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Username
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Details
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Status
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Role
              </th>
              <th scope="col" class="relative px-6 py-3">
                <span class="sr-only">Edit</span>
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
          @foreach($users as $user)
            <tr>
              <td class="px-6 py-4 whitespace-nowrap">
               <a href="{{ route('profile', ['username' => $user->username]) }}">
                <div class="flex items-center">
                  <div class="flex-shrink-0 h-10 w-10">
                  
                    <img class="h-10 w-10 rounded-full" src="{{ $user->profile_photo_url }}" alt="">
                  </div>
                  <div class="ml-4">
                    <div class="text-sm font-medium text-gray-900">
                      {{ $user->name }}
                    </div>
                    <div class="text-sm text-gray-500">
                      {{ $user->email }}
                    </div>
                  </div>
                </div>
                </a>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
              <a href="{{ route('profile', ['username' => $user->username]) }}">
                <div class="text-sm text-gray-900">{{ '@'. $user->username }}</div>
                <div class="text-sm text-gray-500">@if($user->is_private) Private @else Public @endif</div>
               </a>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
               <ul>
                <li class="text-sm text-gray-900">Followers : <span class="text-gray-500"> {{ $user->followers_count }} </span></li>
                <li class="text-sm text-gray-900">Followings : <span class="text-gray-500"> {{ $user->followings_count }} </span></li>
                <li class="text-sm text-gray-900">Posts : <span class="text-gray-500"> {{ $user->posts_count }} </span></li>
               </ul>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                  Active
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                @if($user->role_id === 2)
	                Admin
                @else
	                User
                @endif
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
              </td>
            </tr>
            @endforeach
            
            <!-- More people... -->
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

</div>
