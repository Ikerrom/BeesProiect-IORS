/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package model;

import model.Model;
import java.util.ArrayList;
import javax.swing.table.AbstractTableModel;

/**
 *
 * @author arambarri.oihana
 */
public class MemberTable extends AbstractTableModel {
    /**
     * Private atributes
     */
    private ArrayList<Member> members = new ArrayList<>();
    private String[] columns = {"Dni","Name","Surname","Gmail","Password","Admin","MoneyToPay","MoneyInAccount","Photo url"};
    /**
     * Constructor
     */
    public MemberTable(){
      members=Model.read();
    }
    /**
     * Returns the number of rows in the model.
     */
    @Override
    public int getRowCount() {
        return members.size();
    }
    /**
     * Returns the number of columns in the model.
     */
    @Override
    public int getColumnCount() {
        return columns.length;
    }
   /**
     * Returns the name of the column at columnIndex.
     */  
    @Override
    public String getColumnName(int column){
        return columns[column];
    }
    /**
     * Returns the value for the cell at columnIndex and rowIndex.
     */
    @Override
    public Object getValueAt(int rowIndex, int columnIndex){
        switch(columnIndex){
            case 0: return members.get(rowIndex).getDni();
            case 1: return members.get(rowIndex).getName();
            case 2: return members.get(rowIndex).getSurname();
            case 3: return members.get(rowIndex).getGmail();
            case 4: return members.get(rowIndex).getPassword();
            case 5: return members.get(rowIndex).isAdmin();
            case 6: return members.get(rowIndex).getMoneyToPay();
            case 7: return members.get(rowIndex).getMoneyInAccount();
            case 8: return members.get(rowIndex).getPhoto();
            default: return null;
        }
    }
    /**
     * Returns the most specific superclass for all cell values in the column
     * @param c the index of column
     * @return   the common ancestor class of the object values in the model
     */
    public Class getColumnClass(int c){
        return getValueAt(0, c).getClass();
    }
}
