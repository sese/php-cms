<?php

class ToggleTest extends \PHPUnit\Framework\TestCase {
    public function setUp() {
        $this->handler = $this->createMock(ToggleEventHandler::class);
        $this->toggle = new Toggle($this->handler);
    }

    public function testDefaultState() {
        $this->assertFalse($this->toggle->isOn());
    }

    public function testToggledOnce() {
        $this->handler->expects($this->once())
                      ->method('handleOn');
        $this->toggle->toggle();
        $this->assertTrue($this->toggle->isOn());
    }

    public function testToggledTwice() {
        $this->handler->expects($this->once())
                      ->method('handleOn');
        $this->handler->expects($this->once())
                      ->method('handleOff');

        $this->toggle->toggle();
        $this->toggle->toggle();

        $this->assertFalse($this->toggle->isOn());
    }
}
