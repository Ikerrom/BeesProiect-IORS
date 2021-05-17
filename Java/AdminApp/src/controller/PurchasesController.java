/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ejecutes;

import model.Model;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import javax.swing.JOptionPane;
import model.Buys;
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
    private ViewBuys viewBuys;
    /**
     * Constructor
     * @param model Model
     * @param viewBuys ViewBuys
     */
    public PurchasesController(Model model, ViewBuys viewBuys) {
        this.model = model;
        this.viewBuys = viewBuys;
        anadirActionListener(this);
        
    }
    /**
     * Called just after the user performs an action.
     * @param listener 
     */
    private void anadirActionListener(ActionListener listener) {
        //GUIaren konponente guztiei gehitu listenerra
        viewBuys.jButton1.addActionListener(listener);
        viewBuys.jButton2.addActionListener(listener);
        viewBuys.jButton3.addActionListener(listener);
        viewBuys.jButton5.addActionListener(listener);
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
                int numberBuy = Integer.valueOf(viewBuys.jTextField1.getText());
                int id_product = Integer.valueOf(viewBuys.jTextField2.getText());
                String price = (String)(viewBuys.jTextField3.getText());
                int account = Integer.valueOf(viewBuys.jTextField4.getText());
                Purchase b=new Purchase(numberBuy,id_product,price,account);
                model.addPurchase(b);
                this.viewBuys.setVisible(false);
                ViewBuys view2 = ViewBuys.viewaSortuBistaratu();
                Model model2 = new Model();
                PurchasesController controller = new PurchasesController (model2, view2);
                break;
            case "Delete":
                if(viewBuys.jTable1.getSelectedRow()!=-1){
                    Purchase b1=new Purchase(Integer.parseInt(viewBuys.jTextField1.getText()),Integer.parseInt(viewBuys.jTextField2.getText()),(String)(viewBuys.jTextField3.getText()),Integer.parseInt(viewBuys.jTextField4.getText()));
                    model.deletePurchase(b1);
                    this.viewBuys.setVisible(false);
                    ViewBuys view1 = ViewBuys.viewaSortuBistaratu();
                    Model model1 = new Model();
                    PurchasesController controller1 = new PurchasesController (model1, view1);
                    break;
                }else{
                    JOptionPane.showMessageDialog(null,"You have to seelct row");
                }
                break;
            case "Update":
                if (viewBuys.jTable1.getSelectedRow()!=-1) {
                    int nb = Integer.parseInt(viewBuys.jTextField1.getText());
                    int idproduct = Integer.valueOf(viewBuys.jTextField2.getText());
                    String pric = (String)(viewBuys.jTextField3.getText());
                    int acco = Integer.valueOf(viewBuys.jTextField4.getText());
                    viewBuys.jTable1.setValueAt(nb, viewBuys.jTable1.getSelectedRow(), 0);
                    viewBuys.jTable1.setValueAt(idproduct, viewBuys.jTable1.getSelectedRow(), 1);
                    viewBuys.jTable1.setValueAt(pric, viewBuys.jTable1.getSelectedRow(), 2);
                    viewBuys.jTable1.setValueAt(acco, viewBuys.jTable1.getSelectedRow(), 3);
                    Purchase b2=new Purchase(nb,idproduct,pric,acco);
                    model.updatePurchase(b2);
                    JOptionPane.showMessageDialog(null, "Is change ");
                    this.viewBuys.setVisible(false);
                    ViewBuys view1 = ViewBuys.viewaSortuBistaratu();
                    Model model1 = new Model();
                    PurchasesController controller1 = new PurchasesController (model1, view1);
                    break;

                    
                } else {
                    if (viewBuys.jTable1.getRowCount() == 0) {
                        JOptionPane.showMessageDialog(null, "Table is empty");
                    } else {
                        JOptionPane.showMessageDialog(null, "You have to select a row");
                    }
                }
                break;
            case "Back":
                AdminMenu a1=new AdminMenu();
                a1.setVisible(true);
                this.viewBuys.setVisible(false);
                break;       
        }
    }
 }
