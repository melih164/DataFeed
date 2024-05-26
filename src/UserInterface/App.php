<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Application\DataFeedPusher;
use App\Infrastructure\EntityManagerProvider;
use App\Infrastructure\PushData\PushData;
use App\Infrastructure\ReadData\ReadData;
use App\Infrastructure\ReadData\ReadDataTransformer;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

$logger = new Logger('app');
$logger->pushHandler(new StreamHandler(__DIR__ . '/../../logs/app.log', Logger::toMonologLevel(300)));

$dataFeedPusher = new DataFeedPusher(
    new ReadData(new ReadDataTransformer($logger)),
    new PushData(new EntityManagerProvider(),$logger)
);

try {
    $dataFeedPusher->readAndPushData();
    echo 'Data from Xml read and pushed into Database Successfully';
} catch (Exception $e) {
    $logger->error('An App Error occurred' . $e->getMessage(), ['exception' => $e]);
    echo 'An error occurred while processing data. Please try again later.';
}
