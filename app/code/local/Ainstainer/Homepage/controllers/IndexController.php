<?php
class Ainstainer_Homepage_IndexController extends Mage_Core_Controller_Front_Action {

    public function testModelAction() {
        $params = $this->getRequest()->getParams();
        $slider = Mage::getModel('homepage/slider');
        echo("Loading the blogpost with an ID of ".$params['id']);
        $slider->load($params['id']);
        $data = $slider->getData();
        var_dump($data);
    }

    public function createNewSlideAction() {
        $slider = Mage::getModel('homepage/slider')
            ->setTitle('Code Slide!')
            ->setDescription('This slide was created from code!')
            ->setImageUrl('someurl')
            ->setImage('dataimage')
            ->setStatus('0')
            ->setPosition('2');
        $slider->save();
        echo 'slide with ID ' . $slider->getSlideId() . ' created';
    }

    public function editSlidePostAction() {
        $slider = Mage::getModel('homepage/slider');
        $slider->load(1);
        $slider->setTitle("The First slide!");
        $slider->save();
        echo 'slide edited';
    }

    public function deleteSlidePostAction() {
        $slider = Mage::getModel('homepage/slider');
        $slider->load(1);
        $slider->delete();
        echo 'post removed';
    }

    public function showAllSlidesAction() {
        $slider = Mage::getModel('homepage/slider')->getCollection();
        foreach($slider as $slide){
            echo '<h3>'.$slide->getTitle().'';
            echo nl2br($slide->getPosition());
        }
    }

}