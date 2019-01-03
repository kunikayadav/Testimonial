<?php

class TM_Testimonials_Block_Adminhtml_Page_Edit_Tab_Test
    extends Mage_Adminhtml_Block_Widget_Form
    implements Mage_Adminhtml_Block_Widget_Tab_Interface
{
    protected function _prepareForm()
    {
        $model = Mage::registry('testimonials_data');
        $form  = new Varien_Data_Form();
        $form->setHtmlIdPrefix('page_');

        $fieldset = $form->addFieldset('base_fieldset', array(
            'legend' => Mage::helper('testimonials')->__('Testimonial Information'),
            'class' => 'fieldset-wide'
        ));

        if ($model->getTestimonialId()) {
            $fieldset->addField('testimonial_id', 'hidden', array(
                'name'  => 'testimonial_id'
            ));
        }

        if ($this->_isAllowedAction('save')) {
            $isElementDisabled = false;
        } else {
            $isElementDisabled = true;
        }

       
        $fieldset->addField('company 2', 'text', array(
            'name'     => 'company 2',
            'label'    => Mage::helper('testimonials')->__('Company 2'),
            'title'    => Mage::helper('testimonials')->__('Company 2'),
            'disabled' => $isElementDisabled
        ));

        
        $form->addValues($model->getData());
        $form->setFieldNameSuffix('testimonials');
        $this->setForm($form);
        return parent::_prepareForm();
    }

    protected function _getAdditionalElementTypes()
    {
        return array(
            'image' => Mage::getConfig()->getBlockClassName('testimonials/adminhtml_page_helper_image')
        );
    }

    /**
     * Prepare label for tab
     *
     * @return string
     */
    public function getTabLabel()
    {
        return Mage::helper('testimonials')->__('Company 2');
    }

    /**
     * Prepare title for tab
     *
     * @return string
     */
    public function getTabTitle()
    {
        return Mage::helper('testimonials')->__('Company 2');
    }

    /**
     * Returns status flag about this tab can be shown or not
     *
     * @return true
     */
    public function canShowTab()
    {
        return true;
    }

    /**
     * Returns status flag about this tab hidden or not
     *
     * @return true
     */
    public function isHidden()
    {
        return false;
    }

    /**
     * Check permission for passed action
     *
     * @param string $action
     * @return bool
     */
    protected function _isAllowedAction($action)
    {
        return Mage::getSingleton('admin/session')->isAllowed('templates_master/testimonials/testimonials/' . $action);
    }
}