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
import model.Lata;
import model.Model;


/**
 *
 * @author oihan
 */
public class LatasController implements ActionListener {
    /**
     * Private atributes
     */
    private Model model;
    private ViewLatas viewLatas;
    /**
     * Constructor
     * @param model Model
     * @param viewLatas ViewLatas
     */
    public LatasController(Model model, ViewLatas viewLatas) {
        this.model = model;
        this.viewLatas = viewLatas;
        anadirActionListener(this);
        
    }
    /**
     * Called just after the user performs an action.
     * @param listener 
     */
    private void anadirActionListener(ActionListener listener) {
        viewLatas.jButton1.addActionListener(listener);
        viewLatas.jButton2.addActionListener(listener);
        viewLatas.jButton3.addActionListener(listener);
        viewLatas.jButton5.addActionListener(listener);
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
                Lata l=new Lata(Integer.parseInt(viewLatas.jTextField1.getText()),viewLatas.jTextField2.getText());
                model.addLatas(l);
                this.viewLatas.setVisible(false);
                ViewLatas view2 = ViewLatas.viewaSortuBistaratu();
                Model model2 = new Model();
                LatasController controller = new LatasController (model2, view2);
                break;
            case "Delete":
                int id=(int)viewLatas.jTable1.getModel().getValueAt(viewLatas.jTable1.getSelectedRow(), 0);
                String capa =(String)viewLatas.jTable1.getModel().getValueAt(viewLatas.jTable1.getSelectedRow(), 1);
                if(viewLatas.jTable1.getSelectedRow()!=-1){
                    Lata l1=new Lata(id,capa);
                    model.deleteLatas(l1);
                    this.viewLatas.setVisible(false);
                    ViewLatas view1 = ViewLatas.viewaSortuBistaratu();
                    Model model1 = new Model();
                    LatasController controller1 = new LatasController (model1, view1);
                }else{
                    JOptionPane.showMessageDialog(null,"You have to seelct row");
                }
                break;
            case "Update":
                if (viewLatas.jTable1.getSelectedRow()!=-1) {
                    int id1 =Integer.parseInt(viewLatas.jTextField1.getText());
                    String capa1 = viewLatas.jTextField2.getText();

                    viewLatas.jTable1.setValueAt(id1, viewLatas.jTable1.getSelectedRow(), 0);
                    viewLatas.jTable1.setValueAt(capa1, viewLatas.jTable1.getSelectedRow(), 1);


                    Lata l2=new Lata(id1,capa1);
                    model.updateLatas(l2);
                    JOptionPane.showMessageDialog(null, "Is change");
                    this.viewLatas.setVisible(false);
                    ViewLatas view1 = ViewLatas.viewaSortuBistaratu();
                    Model model1 = new Model();
                    LatasController controller1 = new LatasController (model1, view1);
                    break;

                } else {
                    if (viewLatas.jTable1.getRowCount() == 0) {
                        JOptionPane.showMessageDialog(null, "Table is empty");
                    } else {
                        JOptionPane.showMessageDialog(null, "You have to select a row");
                    }
                }
                break;
            case "Back":
                AdminMenu a1=new AdminMenu();
                a1.setVisible(true);
                this.viewLatas.setVisible(false);
                break;
        }
    }
 }
