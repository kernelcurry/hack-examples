<?hh // strict

// Run Main Function
main();

/**
* This function calls async functions
*/
function main() : void
{
    echo '[main] Calling Async Function'."\n";
    $asyncCall = getInfo();

    echo '[main] Triangulating Atlantis'."\n";
    echo '[main] Calculating the Meaning Of Life'."\n";
    echo '[main] Triangulating Atlantis'."\n";

    echo '[main] Time To Request Async Return Information'."\n";
    $output = $asyncCall->join();

    // Output Vector Data
    foreach ($output as $key => $value)
    {
        echo '['.$key.'] => '.$value."\n";
    }
}

/**
* This async function calls more async functions
*
* @return Vector<T>
*/
async function getInfo() : Awaitable<Vector<T>>
{
    $info = Vector {};

    for ($i = 0; $i < 5; $i++)
    {
        $info[] = genInfo($i);
    }

    echo '[getInfo] Now Awaiting on '."\n";

    return await GenVectorWaitHandle::create($info);
}

/**
* This async function generates information
*
* @return String
*/
async function genInfo(int $id): Awaitable<String> {
    echo '[getInfo] Generating '.$id."\n";

    $tmp = [];
    $tmp['id'] = $id;
    $tmp['start'] = date('H:i:s');

    await SleepWaitHandle::create(mt_rand(1000000,5000000));

    $tmp['end'] = date('H:i:s');

    echo "[getInfo] Completed $id\n";

    return json_encode($tmp);
}