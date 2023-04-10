<?php

interface ActionHandler
{
    public function execute();
}

#[Attribute(Attribute::TARGET_METHOD)]
class SetUp{

    public function __construct(string $where)
    {
        echo $where;
    }
}

class Action implements ActionHandler {

    #[SetUp("Test setup")]
    public function setUp(){
        echo "SetupRun".PHP_EOL;
    }

    public function execute()
    {
        echo "ExecuteRun".PHP_EOL;
    }
}

class ClearAction implements ActionHandler {

    public function execute()
    {
        echo "ClearExecuteRun".PHP_EOL;
    }
}

function executeHandler(ActionHandler $handler) {
    $ref = new ReflectionObject($handler);
    foreach ($ref->getMethods() as $method) {
        if (count($method->getAttributes(SetUp::class))>0) {
            $name = $method->getName();
            $handler->$name();
        }
    }
    $handler->execute();

}

executeHandler(new ClearAction());
executeHandler(new Action());
