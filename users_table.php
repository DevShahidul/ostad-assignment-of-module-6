<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User info</title>
    <link rel="stylesheet" href="./css/main.css">
    <?php 
        $file = fopen("users.csv", "r"); 
        $data = [];
        while (($line = fgetcsv($file)) !== false){
            $data[] = $line;
        }
    ?>

</head>
<body>
    <section class="antialiased bg-gray-100 text-gray-600 h-screen px-4">
        <div class="flex flex-col justify-center h-full">
            <!-- Table -->
            <div class="w-full max-w-2xl mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
                <header class="px-5 py-4 border-b border-gray-100">
                    <h2 class="font-semibold text-gray-800">Users</h2>
                </header>
                <div class="p-3">
                    <div class="overflow-auto">
                        <table class="table-auto w-full">
                            <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                                <tr>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">Name</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">Email</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">Password</div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-sm divide-y divide-gray-100">
                                <?php foreach ($data as $item): ?>
                                <tr>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 flex-shrink-0 mr-2 sm:mr-3"><img class="rounded-full w-10 h-10 object-cover" src="./uploads/<?= $item[0]; ?>" alt="Profile picture"></div>
                                            <div class="font-medium text-gray-800"><?= $item[1]; ?></div>
                                        </div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left"><?= $item[2]; ?></div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left font-medium text-green-500"><?= $item[3]; ?></div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <a class="mt-8 px-8 py-2 max-w-xs text-center block mx-auto text-base bg-emerald-500 rounded-md text-white" href="./index.php">Add new user</a>
                </div>
            </div>
        </div>
    </section>
</body>
</html>