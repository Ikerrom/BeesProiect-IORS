/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package model;

import java.util.ArrayList;
import javax.swing.table.AbstractTableModel;

/**
 *
 * @author arambarri.oihana
 */
public class MemberTable extends AbstractTableModel {
    private ArrayList<Member> members = new ArrayList<>();
    private String[] columns = {"Dni","Name","Surname","Gmail","Password","Admin","MoneyToPay","MoneyInAccount","Photo url"};
    
    public MemberTable(){
      members=Model.read();
    }
    @Override
    public int getRowCount() {
        return members.size();
    }
    
    @Override
    public int getColumnCount() {
        return columns.length;
    }
   
    @Override
    public String getColumnName(int column){
        return columns[column];
    }
    
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
}
