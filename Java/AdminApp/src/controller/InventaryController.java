/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package controller;


import ejecutes.AdminMenu;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import javax.swing.JOptionPane;
import model.Inventary;
import model.Model;


/**
 *
 * @author oihan
 */
public class InventaryController implements ActionListener {
    /**
     * Private atributes
     */
    private Model model;
    private ViewInventary viewInventary;
    /**
     * 
     * @param model Model
     * @param viewInventory ViewInventary
     */
    public InventaryController(Model model, ViewInventary viewInventary) {
        this.model = model;
        this.viewInventary = viewInventary;
        anadirActionListener(this);
        
    }
    /**
     * Called just after the user performs an action.
     * @param listener 
     */
    private void anadirActionListener(ActionListener listener) {
        viewInventary.jButton1.addActionListener(listener);
        viewInventary.jButton2.addActionListener(listener);
        viewInventary.jButton3.addActionListener(listener);
        viewInventary.jButton5.addActionListener(listener);
    }
    /**
     * Invoked when an action occurs.
     * @param e the event to be processed
     */
    @Override
    public void actionPerformed(ActionEvent e) {
        String actionCommand = e.getActionCommand();
        switch (actionCommand) {
            case "Add":
                try{
                    Inventary i=new Inventary(Integer.parseInt(viewInventary.jTextField1.getText()),viewInventary.jTextField2.getText(),Integer.parseInt(viewInventary.jTextField3.getText()));
                    model.addInventary(i);
                    this.viewInventary.setVisible(false);
                    ViewInventary view2 = ViewInventary.viewaSortuBistaratu();
                    Model model2 = new Model();
                    InventaryController controller = new InventaryController (model2, view2);
                    break;
                }catch(NumberFormatException n){
                    JOptionPane.showMessageDialog(null,n.getMessage());
                    break;
                }
                
            case "Delete":
                int id=(int)viewInventary.jTable1.getModel().getValueAt(viewInventary.jTable1.getSelectedRow(), 0);
                String name=(String)viewInventary.jTable1.getModel().getValueAt(viewInventary.jTable1.getSelectedRow(), 1);
                int amount=(int)viewInventary.jTable1.getModel().getValueAt(viewInventary.jTable1.getSelectedRow(), 2);
                if(viewInventary.jTable1.getSelectedRow()!=-1){
                    Inventary i1=new Inventary(id,name,amount);
                    model.deleteInventary(i1);
                    this.viewInventary.setVisible(false);
                    ViewInventary view1 = ViewInventary.viewaSortuBistaratu();
                    Model model1 = new Model();
                    InventaryController controller1 = new InventaryController (model1, view1);
                }else{
                    JOptionPane.showMessageDialog(null,"You have to seelct row");
                }
                break;
            case "Update":
                if (viewInventary.jTable1.getSelectedRow()!=-1) {
                    int id1 =Integer.parseInt(viewInventary.jTextField1.getText());
                    String name1 = (String) viewInventary.jTextField2.getText();
                    int amount1 = Integer.parseInt(viewInventary.jTextField1.getText());

                    
                    viewInventary.jTable1.setValueAt(id1, viewInventary.jTable1.getSelectedRow(), 0);
                    viewInventary.jTable1.setValueAt(name1, viewInventary.jTable1.getSelectedRow(), 1);
                    viewInventary.jTable1.setValueAt(amount1, viewInventary.jTable1.getSelectedRow(), 2);

                    Inventary i2=new Inventary(id1,name1,amount1);
                    model.updateInventary(i2);
                    JOptionPane.showMessageDialog(null, "Is change");
                    this.viewInventary.setVisible(false);
                    ViewInventary view1 = ViewInventary.viewaSortuBistaratu();
                    Model model1 = new Model();
                    InventaryController controller1 = new InventaryController (model1, view1);
                    break;

                } else {
                    if (viewInventary.jTable1.getRowCount() == 0) {
                        JOptionPane.showMessageDialog(null, "Table is empty");
                    } else {
                        JOptionPane.showMessageDialog(null, "You have to select a row");
                    }
                }
                break;
            case "Back":
                AdminMenu a1=new AdminMenu();
                a1.setVisible(true);
                this.viewInventary.setVisible(false);
                break;
        }
    }
 }
