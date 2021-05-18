/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package controller;


import ejecutes.AdminMenu;
import model.Model;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import javax.swing.JOptionPane;
import model.Inventary;


/**
 *
 * @author oihan
 */
public class InventaryController implements ActionListener {
    /**
     * Private atributes
     */
    private Model model;
    private ViewInventary viewInventory;
    /**
     * Constructor
     * @param model Model
     * @param viewMembers  viewMembers
     */
    public InventaryController(Model model, ViewInventary viewInventory) {
        this.model = model;
        this.viewInventory = viewInventory;
        anadirActionListener(this);
        
    }
    /**
     * Called just after the user performs an action.
     * @param listener 
     */
    private void anadirActionListener(ActionListener listener) {
        viewInventory.jButton1.addActionListener(listener);
        viewInventory.jButton2.addActionListener(listener);
        viewInventory.jButton3.addActionListener(listener);
        viewInventory.jButton5.addActionListener(listener);
    }
    /**
     * Invoked when an action occurs.
     * @param e the event to be processed
     */
    @Override
    public void actionPerformed(ActionEvent e) {
        String actionCommand = e.getActionCommand();
        //listenerrak entzun dezakeen eragiketa bakoitzeko. Konponenteek 'actionCommad' propietatea daukate
        switch (actionCommand) {
            case "Add":
                Inventary i=new Inventary(Integer.parseInt(viewInventory.jTextField1.getText()),viewInventory.jTextField2.getText(),Integer.parseInt(viewInventory.jTextField3.getText()));
                model.addInventary(i);
                this.viewInventory.setVisible(false);
                ViewInventary view2 = ViewInventary.viewaSortuBistaratu();
                Model model2 = new Model();
                InventaryController controller = new InventaryController (model2, view2);
                break;
            case "Delete":
                int id=(int)viewInventory.jTable1.getModel().getValueAt(viewInventory.jTable1.getSelectedRow(), 0);
                String name=(String)viewInventory.jTable1.getModel().getValueAt(viewInventory.jTable1.getSelectedRow(), 1);
                int amount=(int)viewInventory.jTable1.getModel().getValueAt(viewInventory.jTable1.getSelectedRow(), 2);
                if(viewInventory.jTable1.getSelectedRow()!=-1){
                    Inventary i1=new Inventary(id,name,amount);
                    model.deleteInventary(i1);
                    this.viewInventory.setVisible(false);
                    ViewInventary view1 = ViewInventary.viewaSortuBistaratu();
                    Model model1 = new Model();
                    InventaryController controller1 = new InventaryController (model1, view1);
                }else{
                    JOptionPane.showMessageDialog(null,"You have to seelct row");
                }
                break;
            case "Update":
                if (viewInventory.jTable1.getSelectedRow()!=-1) {
                    int id1 =Integer.parseInt(viewInventory.jTextField1.getText());
                    String name1 = (String) viewInventory.jTextField2.getText();
                    int amount1 = Integer.parseInt(viewInventory.jTextField1.getText());

                    
                    viewInventory.jTable1.setValueAt(id1, viewInventory.jTable1.getSelectedRow(), 0);
                    viewInventory.jTable1.setValueAt(name1, viewInventory.jTable1.getSelectedRow(), 1);
                    viewInventory.jTable1.setValueAt(amount1, viewInventory.jTable1.getSelectedRow(), 2);

                    Inventary i2=new Inventary(id1,name1,amount1);
                    model.updateInventary(i2);
                    JOptionPane.showMessageDialog(null, "Is change");
                    this.viewInventory.setVisible(false);
                    ViewMembers view1 = ViewMembers.viewaSortuBistaratu();
                    Model model1 = new Model();
                    MemberController controller1 = new MemberController (model1, view1);
                    break;

                } else {
                    if (viewInventory.jTable1.getRowCount() == 0) {
                        JOptionPane.showMessageDialog(null, "Table is empty");
                    } else {
                        JOptionPane.showMessageDialog(null, "You have to select a row");
                    }
                }
                break;
            case "Back":
                AdminMenu a1=new AdminMenu();
                a1.setVisible(true);
                this.viewInventory.setVisible(false);
                break;
        }
    }
 }
