/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package model;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.SQLException;
import javax.swing.JOptionPane;

/**
 *
 * @author arambarri.oihana
 */
public class Model {
    private String url = "jdbc:mariadb://204.204.1.1/bees_project";
    private String user="root"; 
    private String password="dam1";
    public  Connection connect() {
        Connection conn = null;
        try {
            conn = DriverManager.getConnection(url,user,password);
            
            JOptionPane.showMessageDialog(null, "Konektatu zara");
            
        } catch (SQLException e) {
            System.out.println(e.getMessage());
        } 
        
        return conn;
    }
    public  int addMember(Member m){
        String sql = "INSERT INTO Persona(dni,name,surname,gmail,password,admin,moneyToPay,moneyInAccount) VALUES(?,?,?,?,?,?,?)";
        try (Connection conn = connect();
            PreparedStatement ptmt = conn.prepareStatement(sql)) {
            ptmt.setString(1,m.getDni());
            ptmt.setString(2,m.getName());
            ptmt.setString(3,m.getSurname());
            ptmt.setString(3,m.getGmail());
            ptmt.setString(4,m.getPassword());
            ptmt.setBoolean(5,m.isAdmin());
            ptmt.setString(6,m.getMoneyToPay());
            ptmt.setString(7,m.getMoneyInAccount());
            return ptmt.executeUpdate();
        } catch (SQLException e) {
            System.out.println(e.getMessage());
            return 0;
        }
    }
    public void deleteMember(Member m) {
        String sql = "DELETE FROM Persona WHERE dni = ?";

        try (Connection conn = connect();
            PreparedStatement pstmt = conn.prepareStatement(sql)) {
            pstmt.setString(1, m.getDni());
            pstmt.executeUpdate();

        } catch (SQLException e) {
            System.out.println(e.getMessage());
        }
    }
    public  void updateMember(Member m) {
        String sql = "UPDATE Persona SET name = ? ,"
                + "surname = ? ,"
                + "gmail = ?"
                + "password= ?"
                + "admin= ?"
                + "MoneyToPay= ?"
                + "MoneyInAccount= ?"
                + "WHERE dni = ? ";

        try (Connection conn = connect();
                PreparedStatement pstmt = conn.prepareStatement(sql)) {
            pstmt.setString(1,m.getName());
            pstmt.setString(2,m.getSurname());
            pstmt.setString(3, m.getGmail());
            pstmt.setString(4, m.getPassword());
            pstmt.setBoolean(5, m.isAdmin());
            pstmt.setString(6, m.getMoneyToPay());
            pstmt.setString(7, m.getMoneyInAccount());
            pstmt.executeUpdate();
        } catch (SQLException e) {
            System.out.println(e.getMessage());
        }
    }
    
    
    
   
    
}
