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
import model.Member;
import model.Purchase;


/**
 *
 * @author oihan
 */
public class PurchasesController implements ActionListener {
    /**
     * Private atributes
     */
    private Model model;
    private ViewPurchases viewPurchase;
    /**
     * 
     * @param model
     * @param viewBuys 
     */
    public PurchasesController(Model model, ViewPurchases viewBuys) {
        this.model = model;
        this.viewPurchase = viewBuys;
        anadirActionListener(this);
        
    }
    /**
     * Called just after the user performs an action.
     * @param listener 
     */
    private void anadirActionListener(ActionListener listener) {
        viewPurchase.jButton1.addActionListener(listener);
        viewPurchase.jButton2.addActionListener(listener);
        viewPurchase.jButton3.addActionListener(listener);
        viewPurchase.jButton5.addActionListener(listener);
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
                int numberBuy = Integer.valueOf(viewPurchase.jTextField1.getText());
                int id_product = Integer.valueOf(viewPurchase.jTextField2.getText());
                String price = (String)(viewPurchase.jTextField3.getText());
                int account = Integer.valueOf(viewPurchase.jTextField4.getText());
                Purchase b=new Purchase(numberBuy,id_product,price,account);
                model.addPurchase(b);
                this.viewPurchase.setVisible(false);
                ViewPurchases view2 = ViewPurchases.viewaSortuBistaratu();
                Model model2 = new Model();
                PurchasesController controller = new PurchasesController (model2, view2);
                break;
            case "Delete":
                if(viewPurchase.jTable1.getSelectedRow()!=-1){
                    Purchase b1=new Purchase(Integer.parseInt(viewPurchase.jTextField1.getText()),Integer.parseInt(viewPurchase.jTextField2.getText()),(String)(viewPurchase.jTextField3.getText()),Integer.parseInt(viewPurchase.jTextField4.getText()));
                    model.deletePurchase(b1);
                    this.viewPurchase.setVisible(false);
                    ViewPurchases view1 = ViewPurchases.viewaSortuBistaratu();
                    Model model1 = new Model();
                    PurchasesController controller1 = new PurchasesController (model1, view1);
                    break;
                }else{
                    JOptionPane.showMessageDialog(null,"You have to seelct row");
                }
                break;
            case "Update":
                if (viewPurchase.jTable1.getSelectedRow()!=-1) {
                    int nb = Integer.parseInt(viewPurchase.jTextField1.getText());
                    int idproduct = Integer.valueOf(viewPurchase.jTextField2.getText());
                    String pric = (String)(viewPurchase.jTextField3.getText());
                    int acco = Integer.valueOf(viewPurchase.jTextField4.getText());
                    viewPurchase.jTable1.setValueAt(nb, viewPurchase.jTable1.getSelectedRow(), 0);
                    viewPurchase.jTable1.setValueAt(idproduct, viewPurchase.jTable1.getSelectedRow(), 1);
                    viewPurchase.jTable1.setValueAt(pric, viewPurchase.jTable1.getSelectedRow(), 2);
                    viewPurchase.jTable1.setValueAt(acco, viewPurchase.jTable1.getSelectedRow(), 3);
                    Purchase b2=new Purchase(nb,idproduct,pric,acco);
                    model.updatePurchase(b2);
                    JOptionPane.showMessageDialog(null, "Is change ");
                    this.viewPurchase.setVisible(false);
                    ViewPurchases view1 = ViewPurchases.viewaSortuBistaratu();
                    Model model1 = new Model();
                    PurchasesController controller1 = new PurchasesController (model1, view1);
                    break;

                    
                } else {
                    if (viewPurchase.jTable1.getRowCount() == 0) {
                        JOptionPane.showMessageDialog(null, "Table is empty");
                    } else {
                        JOptionPane.showMessageDialog(null, "You have to select a row");
                    }
                }
                break;
            case "Back":
                AdminMenu a1=new AdminMenu();
                a1.setVisible(true);
                this.viewPurchase.setVisible(false);
                break;       
        }
    }
 }
